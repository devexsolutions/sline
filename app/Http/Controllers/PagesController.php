<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;
use App\Models\USer;
use App\Models\Foto;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\Tarifa;
use App\Models\Notification;
use Carbon\Carbon;

use Illuminate\Support\Facades\File;
use Auth;
use DB;

use App\Events\CambioEstadoTrabajo;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verTarifas()
    {
        $tarifas = Tarifa::all();          
        return view('tarifas', compact('tarifas'));
    }


    public function solicitarRecogida()
    {
        $trabajos = DB::table('trabajos')->where('user_id', '=', Auth::user()->id )->get();       
        return view('solicitar_recogida', compact('trabajos'));
    }

    public function obtenerNotificaciones()
    {
        $notifications = DB::table('notifications')
        ->where('user_id', '=', Auth::user()->id )
        ->orderby('created_at', 'desc')
        ->get();       
        return view('notificaciones', compact('notifications'));
    }


    public function saveNotificaciones(int $id)
    {
        $notificacion = Notification::find($id);
        $notificacion->leido = true;
        $notificacion->update(); 
        return redirect()->route('notificaciones')->with('message','La notificación se marcó como leída correctamente');
        
    }


    public function verDashboard()
    {
        if (Auth::user()->is_admin)
            $trabajos = Trabajo::all();          
        else
            $trabajos = DB::table('trabajos')->where('user_id', '=', Auth::user()->id )->get(); 
        
        $estados = Estado::all();
        $estado =  $estados->toArray(); 

        $notifications_no_leidas = DB::table('notifications')
        ->where('user_id', '=', Auth::user()->id )
        ->where('leido', '=', 'false')
        ->orderby('created_at', 'desc')
        ->get();       

        session(['notifications_no_leidas' => count($notifications_no_leidas)]);
        
        $colores = ["gray-200", "red-400", "orange-200", "green-200", "blue-200", "indigo-200", "purple-200", "pink-200",
        "gray-300", "red-500", "orange-300", "green-300", "blue-300", "indigo-300", "purple-300", "pink-300",
        "gray-400", "red-600", "orange-500", "green-500", "blue-500", "indigo-500", "purple-500", "pink-500",   
    ];
      
        return view('dashboard', compact('trabajos', 'estado','colores','notifications_no_leidas'));
      
    }


    public function externoStls()
    {
      
        $trabajos = DB::table('trabajos')
        ->where('estado_cod', '<', '3' )
        ->get(); 
        
        return view('externo.adjuntar-stl', compact('trabajos'));
      
    }

    public function guardarStl(Request $request)
    {         
        $trabajo = Trabajo::find(session('trabajo_guardado'));   
        $nuevoEstado = "Trabajo creado";
        $usuario = User::find($trabajo->user_cod);        
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajos.create');
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
        
        

        $trabajo = Trabajo::find($id);
        $estados = Estado::All();
        $estado =  $estados->toArray();
        $nuevoEstado = $estados[$trabajo->estado_cod];
       
       
        $trabajo->estado_cod = '2';
        $trabajo->update();  
        
        $usuario = User::find($trabajo->user_id);
        
         // call our event here
         event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo->id));


        return view('admin.trabajos.view', compact('trabajo','fotos','nombrefotos'));
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

   
    
}
