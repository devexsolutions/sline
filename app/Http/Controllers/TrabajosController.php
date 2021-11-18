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
				$path = $request->file('oclusion')->store('public/fotos-trabajos');
				$documentos['oclusion'] = $path;	
            }
            if($request->hasfile('lateralDerecho'))
            {
                $path = $request->file('lateralDerecho')->store('public/fotos-trabajos');
				$documentos['lateralDerecho'] = $path;
            }
            if($request->hasfile('lateralIzquierdo'))
            {
                $path = $request->file('lateralIzquierdo')->store('public/fotos-trabajos');
				$documentos['lateralIzquierdo'] = $path;
            }
            if($request->hasfile('arcoSuperior'))
            {
                $path = $request->file('arcoSuperior')->store('public/fotos-trabajos');
				$documentos['arcoSuperior'] = $path;
            }
            if($request->hasfile('arcoInferior'))
            {
                $path = $request->file('arcoInferior')->store('public/fotos-trabajos');
				$documentos['arcoInferior'] = $path;
            }
            if($request->hasfile('sonrisa'))
            {
                $path = $request->file('sonrisa')->store('public/fotos-trabajos');
				$documentos['sonrisa'] = $path;
            }
            if($request->hasfile('reposo'))
            {
                $path = $request->file('reposo')->store('public/fotos-trabajos');
				$documentos['reposo'] = $path;
            }
            if($request->hasfile('perfilReposo'))
            {
                $path = $request->file('perfilReposo')->store('public/fotos-trabajos');
				$documentos['perfilReposo'] = $path;
            }

            if($request->hasfile('rxPanoramica'))
            {
                $path = $request->file('rxPanoramica')->store('public/fotos-trabajos');
				$documentos['rxPanoramica'] = $path;
            }

            if($request->hasfile('otro'))
            {
                $path = $request->file('otro')->store('public/fotos-trabajos');
				$documentos['otro'] = $path;
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
            $path = $request->file('prescripcion')->store('documentos-legales');
			$documentos['prescripcion'] = $path;          
          
        }
        if($request->hasfile('advertencias'))
        {
            $path = $request->file('advertencias')->store('documentos-legales');
			$documentos['advertencias'] = $path;         
        }

        if($request->hasfile('autorizacion'))
        {
            $path = $request->file('autorizacion')->store('documentos-legales');
			$documentos['autorizacion'] = $path;         
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
       
        $fileName = $this->createFilename($file);        
        $mime = str_replace('/', '-', $file->getMimeType());
        $dateFolder = date("Y-m-W");        
        $filePath = "fotos-trabajos/". session('trabajo_guardado'). "/";
        $finalPath = storage_path("public/".$filePath);

        // move the file name
        $file->move($finalPath, $fileName);

        return response()->json([
            'path' => $filePath,
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
        $documentos = $trabajo->documentos;
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
        return view('trabajos.view', compact('trabajo','fotos','nombrefotos','documentos','documentos_planificacion','documentos_envio'));
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
