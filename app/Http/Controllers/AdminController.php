<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;
use App\Models\USer;
use App\Models\Foto;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\Tarifa;
use App\Models\Historico;

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
        $trabajos = DB::table('trabajos')        
        ->where('estado_cod', '<', 98)
        ->get();   
        $estados = Estado::all();
        $estado =  $estados->toArray();


        $colores = ["gray-200", "red-400", "orange-200", "green-200", "blue-200", "indigo-200", "purple-200", "pink-200",
        "gray-300", "red-500", "orange-300", "green-300", "blue-300", "indigo-300", "purple-300", "pink-300",
        "gray-400", "red-600", "orange-500", "green-500", "blue-500", "indigo-500", "purple-500", "pink-500",   
        ];
      
        return view('admin.trabajos.index', compact('trabajos', 'estado','colores'));
    }


    public function listarUsuarios()
    {
        $usuarios = User::all();   
        $estados = Estado::all();
        $estado =  $estados->toArray();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function verUsuario(int $id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.view', compact('usuario'));
    }

    public function postActivarUsuario(Request $request)
    {
        
        $usuario = User::find($request->idUsuario);
        $usuario->is_active = true;
        $usuario->update(); 
        return redirect()->route('admin.usuarios')->with('message','Usuario activado correctamente');
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

        $nuevoEstado = "El trabajo ha cambiado de estado a Pendiente de Planificación";
        $usuario = User::find($trabajo->user_cod);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));

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
        $nombrefotos = array('oclusion','lateralDerecho','lateralIzquierdo','arcoSuperior','arcoInferior','sonrisa','reposo','perfilReposo','rxPanoramica','otro','superiorStl','inferiorStl','oclusionStl');
        
        if ($trabajo->estado_cod == 1){
            $trabajo->estado_cod = '2'; //Pendiente Planificar
            $trabajo->update();
            $nuevoEstado = "El trabajo ha cambiado de estado a Pendiente de Planificación";
            $usuario = User::find($trabajo->user_cod);        
            event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));
        }  
      
        $documentos_planificacion = DB::table('documentos')
                                    ->whereIn('nombre', ['IPR', 'url_planificacion', 'presupuesto', 'factura'])
                                    ->where('trabajo_id', '=', session('trabajo_seleccionado'))
                                    ->get();

        $documentos_envio = DB::table('documentos')
        ->whereIn('nombre', ['url_seguimiento_plantillas', 'url_seguimiento_envio_parcial', 'url_seguimiento_envio_completo'])
        ->where('trabajo_id', '=', session('trabajo_seleccionado'))
        ->get();
                
        $historico = DB::table('historicos')
            ->join('users', 'users.id', '=', 'historicos.user_id')                     
            ->select('historicos.*', 'users.nombre_fiscal')
            ->where('historicos.trabajo_id', '=', session('trabajo_seleccionado'))
            ->get();

        $usuario = User::find($trabajo->user_id);        
        
        return view('admin.trabajos.view', compact('trabajo','fotos','nombrefotos','historico','documentos_planificacion','documentos_envio'));
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

        $nuevoEstado = "El trabajo ha cambiado de estado a Planificación Realizada";
        $usuario = User::find($trabajo->user_cod);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));



        return redirect()->route('admin.trabajos')->with('message','El trabajo ha cambiado de estado a Planificación Realizada');
    }

    public function postGuardarPresupuesto(Request $request)
    {       
        if($request->hasfile('presupuesto'))
        {
            $path = public_path().'/documentos-gestion/' . session('trabajo_seleccionado') ;
            File::makeDirectory($path, $mode = 0755, true, true);   
            $nombre_sanitizado = str_replace(" ", "_", $request->file('presupuesto')->getClientOriginalName() );       
            $request->file('presupuesto')->move($path,$nombre_sanitizado);            
            $documento = new Documento();
            $documento->trabajo_id =  session('trabajo_seleccionado');
            $documento->nombre = "presupuesto";
            $documento->nombre_archivo =  $nombre_sanitizado;
            $documento->save();
        }
                  
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));        
        $trabajo->estado_cod = '4'; //Pendiente de Pago
        $trabajo->update(); 

        $nuevoEstado = "El trabajo ha cambiado de estado a Pendiente de Pago";
        $usuario = User::find($trabajo->user_cod);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));


        return redirect()->route('admin.trabajos')->with('message','El trabajo ha cambiado de estado correctamente. Pendiente de Pago');
    }

    public function postGuardarFactura(Request $request)
    {       
        if($request->hasfile('factura'))
        {
            $path = public_path().'/documentos-gestion/' .  session('trabajo_seleccionado');
            File::makeDirectory($path, $mode = 0755, true, true);   
            $nombre_sanitizado = str_replace(" ", "_", $request->file('factura')->getClientOriginalName() );       
            $request->file('factura')->move($path,$nombre_sanitizado);            
            $documento = new Documento();
            $documento->trabajo_id =  session('trabajo_seleccionado');
            $documento->nombre = "factura";
            $documento->nombre_archivo =  $nombre_sanitizado;
            $documento->save();
        }
                    
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));        
        $trabajo->estado_cod = '5'; //Fabricacion
        $trabajo->update(); 

        // Buscamos si hay algúna solicitud de recogida por parte del cliente.


        $nuevoEstado = "El trabajo ha cambiado de estado a Pendiente de Pago";
        $usuario = User::find($trabajo->user_cod);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));

        return redirect()->route('admin.trabajos')->with('message','El trabajo ha cambiado de estado correctamente. Pago Recibido');
    }

    public function postGuardarEnvio(Request $request)
    {       
        switch ($request->tipoEnvio) {
            case 'ataches':
                $estado = 9;
                $enviado = " Plantilla de Ataches";
                $nombre = "url_seguimiento_plantillas";
                $url_envio = $request->url_seguimiento;
                break;
            case 'parcial':
                $estado = 10;
                $enviado = " Caso Parcial";
                $nombre = "url_seguimiento_envio_parcial";
                $url_envio = $request->url_seguimiento_parcial;
                break;
            case 'completo':
                $estado = 11;
                $enviado = " Caso Completo";
                $nombre = "url_seguimiento_envio_completo";
                $url_envio = $request->url_seguimiento_total;
                break;           
        }

        $documento = new Documento();
        $documento->trabajo_id =  session('trabajo_seleccionado');
        $documento->nombre = $nombre;
        $documento->nombre_archivo =  $url_envio;
        $documento->save();

        $textoOperacion = "El trabajo pasa a envio de ".$enviado;
           
        $trabajo = Trabajo::find(session('trabajo_seleccionado'));        
        $trabajo->estado_cod = $estado; 
        $trabajo->update(); 

        $nuevoEstado = "El trabajo pasa a envio de ".$enviado;
        $usuario = User::find($trabajo->user_id);        
        event(new CambioEstadoTrabajo($nuevoEstado, $usuario, $trabajo));

        return redirect()->route('admin.trabajos')->with('message','El trabajo ha cambiado de estado correctamente a '.$textoOperacion);
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
