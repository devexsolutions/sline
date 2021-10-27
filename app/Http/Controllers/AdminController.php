<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;
use App\Models\USer;
use App\Models\Foto;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\Tarifa;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

use Auth;
use DB;

use App\Events\CambioEstadoTrabajo;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajos = Trabajo::all();      
        $estados = Estado::all();
        $estado =  $estados->toArray();


        $colores = ["gray-200", "red-400", "orange-2500", "green-200", "blue-200", "indigo-200", "purple-200", "pink-200",
        "gray-300", "red-500", "orange-300", "green-300", "blue-300", "indigo-300", "purple-300", "pink-300",
        "gray-400", "red-600", "orange-500", "green-500", "blue-500", "indigo-500", "purple-500", "pink-500",   
    ];
      
        return view('admin.trabajos.index', compact('trabajos', 'estado','colores'));
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
       
        session(['trabajo_seleccionado' => $trabajo->id ]);

        $trabajo->estado_cod = '2';
        $trabajo->update();  
        
        $usuario = User::find($trabajo->user_id);
        
         // call our event here
         event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo->id));


        return view('admin.trabajos.view', compact('trabajo','fotos','nombrefotos'));
    }


    public function view(int $id)
    {
        
        $trabajo = Trabajo::find($id);
        $estados = Estado::All();
        $estado =  $estados->toArray();
        $nuevoEstado = $estados[$trabajo->estado_cod];
        session(['trabajo_seleccionado' => $trabajo->id ]);
        $fotos = $trabajo->fotos; //>toArray();
        $nombrefotos = array('oclusion','lateralDerecho','lateralIzquierdo','arcoSuperior','arcoInferior','sonrisa','reposo','perfilReposo');
        
        if ($trabajo->estado_cod == 1){
            $trabajo->estado_cod = '2'; //Pendiente Planificar
            $trabajo->update();
        }  
        
        $historico = DB::table('historico')->where('trabajo_id', '=', session('trabajo_seleccionado') )->get();

        $usuario = User::find($trabajo->user_id);
        
         // call our event here
         //event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo->id));


        return view('admin.trabajos.view', compact('trabajo','fotos','nombrefotos','historico'));
    }


    public function postGuardarPlanificacion(Request $request)
    {       
        if($request->hasfile('ipr'))
        {
            $path = public_path().'/documentos-gestion/' .  $request->session()->get('trabajo-id');
            File::makeDirectory($path, $mode = 0755, true, true);   
            $nombre_sanitizado = str_replace(" ", "_", $request->file('ipr')->getClientOriginalName() );       
            $request->file('ipr')->move($path,$nombre_sanitizado);            
            $documento = new Documento();
            $documento->trabajo_id =  session('trabajo_seleccionado');
            $documento->nombre = "IPR";
            $documento->nombre_archivo =  $nombre_sanitizado;
            $documento->save();
        }
        if(!empty($request->url_planificacion))
        {
            $documento = new Documento();
            $documento->trabajo_id = session('trabajo_seleccionado');
            $documento->nombre =  "url_planificacion";
            $documento->nombre_archivo = $request->url_planificacion;
            $documento->save();
        }            
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));        
        $trabajo->estado_cod = '3'; //Planificacion Realizada
        $trabajo->update(); 



        return redirect()->route('admin.trabajos');
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
