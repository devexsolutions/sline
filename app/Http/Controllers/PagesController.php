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


    public function verDashboard()
    {
        if (Auth::user()->is_admin)
            $trabajos = Trabajo::all();          
        else
            $trabajos = DB::table('trabajos')->where('user_id', '=', Auth::user()->id )->get(); 
        
        $estados = Estado::all();
        $estado =  $estados->toArray(); 
        
        $colores = ["gray-200", "red-400", "orange-200", "green-200", "blue-200", "indigo-200", "purple-200", "pink-200",
        "gray-300", "red-500", "orange-300", "green-300", "blue-300", "indigo-300", "purple-300", "pink-300",
        "gray-400", "red-600", "orange-500", "green-500", "blue-500", "indigo-500", "purple-500", "pink-500",   
    ];
      
        return view('dashboard', compact('trabajos', 'estado','colores'));
      
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
