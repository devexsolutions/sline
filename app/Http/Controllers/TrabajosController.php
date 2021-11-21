<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;
use App\Models\User;
use App\Models\Foto;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\Historico;
use App\Models\Tarifa;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Auth;
use DB;
use Storage;
use Illuminate\Support\Facades\Event;
use App\Events\CambioEstadoTrabajo;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;


use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class TrabajosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $trabajos = DB::table('trabajos')
                        ->where('user_id', '=', Auth::user()->id )
                        ->where('estado_cod', '<', 98)
                        ->get();
        $estados = Estado::all();
        $estado =  $estados->toArray();
        
        $colores = ["gray-200", "red-400", "orange-200", "green-200", "blue-200", "indigo-200", "purple-200", "pink-200",
                    "gray-300", "red-500", "orange-300", "green-300", "blue-300", "indigo-300", "purple-300", "pink-300",
                    "gray-400", "red-600", "orange-500", "green-500", "blue-500", "indigo-500", "purple-500", "pink-500",   
                ];
      
        return view('trabajos.index', compact('trabajos', 'estado','colores'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajos.create');
    }

    
    public function postAdjuntarImagenes(Request $request)
    {
            $fotos = array();
            if($request->hasfile('oclusion'))
            {      					
                $file = $request->file('oclusion');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['oclusion'] = $imageName;
            }
            if($request->hasfile('lateralDerecho'))
            {
                $file = $request->file('lateralDerecho');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['lateralDerecho'] = $imageName;
            }
            if($request->hasfile('lateralIzquierdo'))
            {
                $file = $request->file('lateralIzquierdo');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['lateralIzquierdo'] = $imageName;
            }
            if($request->hasfile('arcoSuperior'))
            {
                $file = $request->file('arcoSuperior');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['arcoSuperior'] = $imageName;
            }
            if($request->hasfile('arcoInferior'))
            {
                $file = $request->file('arcoInferior');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['arcoInferior'] = $imageName;
            }
            if($request->hasfile('sonrisa'))
            {
                $file = $request->file('sonrisa');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['sonrisa'] = $imageName;
            }
            if($request->hasfile('reposo'))
            {
                $file = $request->file('reposo');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['reposo'] = $imageName;
            }
            if($request->hasfile('perfilReposo'))
            {
                $file = $request->file('perfilReposo');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['perfilReposo'] = $imageName;
            }

            if($request->hasfile('rxPanoramica'))
            {
                $file = $request->file('rxPanoramica');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['rxPanoramica'] = $imageName;
            }

            if($request->hasfile('otro'))
            {
                $file = $request->file('otro');
                $imageName=time().$file->getClientOriginalName();           
                Storage::disk('s3')->put('fotos/'.$imageName, file_get_contents($file));
                $fotos['otro'] = $imageName;
            }           
            
            foreach($fotos as $indice =>$valor){
                $foto = new Foto();
                $foto->trabajo_id =  $request->session()->get('trabajo-id');
                $foto->nombre = $indice;
                $foto->nombre_archivo = $valor;
                $foto->save();
            }

            $trabajo = Trabajo::find($request->session()->get('trabajo-id'));
            $trabajo->estado_cod = '1'; // Con Documentos Legales
            $trabajo->update();

                               
            return redirect()->route('trabajos.adjuntar-stl')->with('message','Las imágenes se guardaron correctamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajo $trabajo)
    {        
        $fotos = $trabajo->fotos; //>toArray();
        $nombrefotos = array('oclusion','lateralDerecho','lateralIzquierdo','arcoSuperior','arcoInferior','sonrisa','reposo','perfilReposo');
        return view('trabajos.edit', compact('trabajo','fotos','nombrefotos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
    
        return false;
    }

    public function seleccionaTarifa(Request $request)
    {
        $tarifas = Tarifa::all();
        return view('trabajos.selecciona-tarifa', compact('tarifas'));
    }

    public function postSeleccionaTarifa(Request $request){
        $validatedData = $request->validate([
            'tarifa_cod' => 'required',            
        ]);
        if(empty($request->session()->get('tarifa_cod'))){
            $trabajo = new Trabajo();
            $trabajo->fill($validatedData);
            $request->session()->put('trabajo', $trabajo);
        }else{
            $trabajo = $request->session()->get('trabajo');
            $trabajo->fill($validatedData);
            $request->session()->put('trabajo', $trabajo);
        }

        return redirect()->route('trabajos.datos-paciente')->with('message','Tarífa seleccionada correctamente');
    }

    public function datosPaciente(Request $request)
    {
       
        return view('trabajos.datos-paciente');
    }

    public function postDatosPaciente(Request $request)
    {     
        $trabajo = $request->session()->get('trabajo');
        $trabajo->tipo_cod = intval($request->tipo_cod);
        $trabajo->nombre_paciente = $request->nombre_paciente;
        $trabajo->apellidos_paciente = $request->apellidos_paciente;
        $trabajo->edad = $request->edad;
        $trabajo->nombre_clinica = $request->nombre_clinica;
        $trabajo->nombre_doctor = $request->nombre_doctor;
        $trabajo->objetivos = $request->objetivos;
        $trabajo->numero_colegiado = $request->numero_colegiado;
        $trabajo->numero_expediente = $request->numero_expediente;
        $trabajo->fecha_solicitud = Carbon::now();
        $trabajo->estado_cod = '99'; // Solicitud Incompleta
        $trabajo->user_id = Auth::user()->id;

        $trabajo->save(); 
        $trabajoId = $trabajo->id;
        $request->session()->put('trabajo-id', $trabajoId);

        session(['trabajo_guardado' => $trabajo->id ]);
        $usuario = User::find( Auth::user()->id );

        return redirect()->route('trabajos.documentos-legales')->with('message','Datos del Paciente guardados correctamente');
    }

    public function documentosLegales(Request $request)
    {       
        return view('trabajos.documentos-legales');
    }

    public function postDocumentosLegales(Request $request)
    {
    
        if($request->hasfile('prescripcion'))
        {
          // $path = $request->file('prescripcion')->store('documentos-legales'); 
            
            $file = $request->file('prescripcion');
            $imageName=time().$file->getClientOriginalName();            
            Storage::disk('s3')->put('documentos-legales/'.$imageName, file_get_contents($file));
            $documentos['prescripcion'] = $imageName;
   
        }   
          
        if($request->hasfile('advertencias'))
        {
            $file = $request->file('advertencias');
            $imageName=time().$file->getClientOriginalName();            
            Storage::disk('s3')->put('documentos-legales/'.$imageName, file_get_contents($file));
            $documentos['advertencias'] = $imageName;         
        }

        if($request->hasfile('autorizacion'))
        {
            $file = $request->file('autorizacion');
            $imageName=time().$file->getClientOriginalName();           
            Storage::disk('s3')->put('documentos-legales/'.$imageName, file_get_contents($file));
            $documentos['autorizacion'] = $imageName;        
        }
        
        foreach($documentos as $indice =>$valor){
            $documento = new Documento();
            $documento->trabajo_id = $request->session()->get('trabajo-id');
            $documento->nombre = $indice;
            $documento->nombre_archivo = $valor;
            $documento->save();
        }

        $trabajo = Trabajo::find($request->session()->get('trabajo-id'));
        $trabajo->estado_cod = '98'; // Con Documentos Legales
        $trabajo->update();

        return redirect()->route('trabajos.adjuntar-imagenes')->with('message','Documentos guardados correctamente');
    }

    public function adjuntarImagenes(Request $request)
    {       
        return view('trabajos.adjuntar-imagenes');
    }

    public function adjuntarStl(Request $request)
    {        
        return view('trabajos.adjuntar-stl');
    }

    public function postAdjuntarStl(Request $request)
    {    
         
          $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
          $save = $receiver->receive();
          if ($save->isFinished()) {
              return $this->saveFile($save->getFile());
          } 
      
          $handler = $save->handler();
  
          return response()->json([
              "done" => $handler->getPercentageDone(),
              'status' => true
          ]);
    }


    public function guardarStl(Request $request)
    {         
        $trabajo = Trabajo::find(session('trabajo_guardado'));   
        $nuevoEstado = "Trabajo creado";
        $usuario = User::find($trabajo->user_id);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));
        return redirect()->route('trabajos');
    }

      /**
     * Saves the file
     *
     * @param UploadedFile $file
     *
     * @return JsonResponse
     */
    protected function saveFile(UploadedFile $file)
    {
        ini_set('max_execution_time', 180); //3 minutes
        $fileName = $this->createFilename($file);        
        $mime = str_replace('/', '-', $file->getMimeType());     
        Storage::disk('s3')->put('stl/'.$fileName, file_get_contents($file));    

        return response()->json([
            'path' => 'stl/'.$fileName,
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension
        $filename .= "_" . md5(time()) . "." . $extension;
        return $filename;
    }


    public function postAceptarPlanificacion(Request $request)
    {
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));
        $trabajo->estado_cod = '4'; //Pendiente Pago
        $trabajo->update();
       
        $nuevoEstado = "El trabajo ha sido aceptado por el cliente";
        $usuario = User::find($trabajo->user_id);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));

        return redirect()->route('trabajos')->with('message','El trabajo ha cambiado de estado correctamente. Aceptada Planificación');
    }

    public function postRechazarPlanificacion(Request $request)
    {
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));
        $trabajo->estado_cod = '20'; //Segunda Revision
        $trabajo->update();

        $nuevoEstado = "El trabajo ha sido rechazado por el cliente";
        $usuario = User::find($trabajo->user_id);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));

        return redirect()->route('trabajos')->with('message','El trabajo ha cambiado de estado correctamente. Rechazada Planificación');
    }



    public function view(int $id)
    {
        
        $trabajo = Trabajo::find($id);
        $estados = Estado::All();
        $estado =  $estados->toArray();
        $nuevoEstado = $estados[$trabajo->estado_cod];
        session(['trabajo_seleccionado' => $trabajo->id ]);
        $fotos = $trabajo->fotos; //>toArray();
        $imagenesS3 = array();
        foreach ($fotos as $foto) {
            $imagenesS3[$foto->nombre] = Storage::disk('s3')->temporaryUrl('fotos/'.$foto->nombre_archivo, now()->addMinutes(10));
        }

        $documentos = $trabajo->documentos;
        foreach ($documentos as $documento) {
            $documentos_legales[$documento->nombre] =  Storage::disk('s3')->temporaryUrl('documentos-legales/'.$documento->nombre_archivo, now()->addMinutes(10));
        }

       
      
        $nombrefotos = array('oclusion','lateralDerecho','lateralIzquierdo','arcoSuperior','arcoInferior','sonrisa','reposo','perfilReposo','rxPanoramica','otro','superiorStl','inferiorStl','oclusionStl');
        $usuario = User::find($trabajo->user_id);
        $documentos_planificacion = DB::table('documentos')
        ->whereIn('nombre', ['IPR', 'url_planificacion', 'presupuesto', 'factura'])
        ->where('trabajo_id', '=', session('trabajo_seleccionado'))
        ->get();

        $documentos_envio = DB::table('documentos')
        ->whereIn('nombre', ['url_seguimiento_plantillas', 'url_seguimiento_envio_parcial', 'url_seguimiento_envio_completo'])
        ->where('trabajo_id', '=', session('trabajo_seleccionado'))
        ->get();
        return view('trabajos.view', compact('trabajo','fotos','nombrefotos','documentos','documentos_planificacion','documentos_envio','documentos_legales','imagenesS3'));
    }



    public function postRechazarEnvio(Request $request)
    {       
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));        
        $trabajo->estado_cod = '12'; //Plantillas aceptadas
        $trabajo->update(); 

        $nuevoEstado = "El Envío ha sido rechazado por el cliente";
        $usuario = User::find($trabajo->user_id);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));
        
        return redirect()->route('trabajos')->with('message','El trabajo ha cambiado de estado correctamente');           
       
    }

    public function postAceptarEnvio(Request $request)
    {              
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));        
        $trabajo->estado_cod = '12'; //Plantillas aceptadas
        $trabajo->update(); 

        $nuevoEstado = "El Envío ha sido aceptado por el cliente";
        $usuario = User::find($trabajo->user_id);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));

        return redirect()->route('trabajos')->with('message','El trabajo ha cambiado de estado correctamente');
    }
}
