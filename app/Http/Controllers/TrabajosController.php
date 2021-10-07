<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;
use App\Models\Foto;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\Tarifa;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class TrabajosController extends Controller
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
      
        return view('trabajos.index', compact('trabajos', 'estado'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdjuntarImagenes(Request $request)
    {
        
          
            $fotos = array();
            if($request->hasfile('oclusion'))
            {
                $path = public_path().'/fotos-trabajos/' .  $request->session()->get('trabajo-id');;
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('oclusion')->move($path,$request->file('oclusion')->getClientOriginalName());
                $fotos['oclusion'] = $request->file('oclusion')->getClientOriginalName();
            }
            if($request->hasfile('lateralDerecho'))
            {
                $path = public_path().'/fotos-trabajos/' . $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('lateralDerecho')->move($path,$request->file('lateralIzquierdo')->getClientOriginalName());
                $fotos['lateralDerecho'] = $request->file('lateralDerecho')->getClientOriginalName();
            }
            if($request->hasfile('lateralIzquierdo'))
            {
                $path = public_path().'/fotos-trabajos/' .  $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('lateralIzquierdo')->move($path,$request->file('lateralIzquierdo')->getClientOriginalName());
                $fotos['lateralIzquierdo'] = $request->file('lateralIzquierdo')->getClientOriginalName();
            }
            if($request->hasfile('arcoSuperior'))
            {
                $path = public_path().'/fotos-trabajos/' .  $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('arcoSuperior')->move($path,$request->file('arcoSuperior')->getClientOriginalName());
                $fotos['arcoSuperior'] = $request->file('arcoSuperior')->getClientOriginalName();
            }
            if($request->hasfile('arcoInferior'))
            {
                $path = public_path().'/fotos-trabajos/' .  $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('arcoInferior')->move($path,$request->file('arcoInferior')->getClientOriginalName());
                $fotos['arcoInferior'] = $request->file('arcoInferior')->getClientOriginalName();
            }
            if($request->hasfile('sonrisa'))
            {
                $path = public_path().'/fotos-trabajos/' .  $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('sonrisa')->move($path,$request->file('sonrisa')->getClientOriginalName());
                $fotos['sonrisa'] = $request->file('sonrisa')->getClientOriginalName();
            }
            if($request->hasfile('reposo'))
            {
                $path = public_path().'/fotos-trabajos/' .  $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('reposo')->move($path,$request->file('reposo')->getClientOriginalName());
                $fotos['reposo'] = $request->file('reposo')->getClientOriginalName();
            }
            if($request->hasfile('perfilReposo'))
            {
                $path = public_path().'/fotos-trabajos/' . $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('perfilReposo')->move($path,$request->file('perfilReposo')->getClientOriginalName());
                $fotos['perfilReposo'] = $request->file('perfilReposo')->getClientOriginalName();
            }
            
            foreach($fotos as $indice =>$valor){
                $foto = new Foto();
                $foto->trabajo_id =  $request->session()->get('trabajo-id');
                $foto->nombre = $indice;
                $foto->nombre_archivo = $valor;
                $foto->save();
            }
                     
            return redirect()->route('trabajos.index');
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
       // print_r($fotos);      
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

        return redirect()->route('trabajos.datos-paciente');
    }

    public function datosPaciente(Request $request)
    {
       
        return view('trabajos.datos-paciente');
    }

    public function postDatosPaciente(Request $request)
    {
     
           // $trabajo = new Trabajo;
        $trabajo = $request->session()->get('trabajo');
        $trabajo->tipo_cod = intval($request->tipo_cod);
        $trabajo->nombre_paciente = $request->nombre_paciente;
        $trabajo->apellidos_paciente = $request->apellidos_paciente;
        $trabajo->edad = $request->edad;
        $trabajo->nombre_clinica = $request->nombre_clinica;
        $trabajo->nombre_doctor = $request->nombre_doctor;
        $trabajo->objetivos = $request->objetivos;
        $trabajo->fecha_solicitud = Carbon::now();
        $trabajo->estado_cod = '1';
        $trabajo->user_id = 1;
           
        if(!empty($request->session()->get('trabajo-id'))){
            $trabajo->update();
        }else{
            $trabajo->save(); 
            $trabajoId = $trabajo->id;
            $request->session()->put('trabajo-id', $trabajoId);
        }
           return redirect()->route('trabajos.documentos-legales');
    }

    public function documentosLegales(Request $request)
    {
       
        return view('trabajos.documentos-legales');
    }

    public function postDocumentosLegales(Request $request)
    {
       
       // $request->validate([
        //    'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        //    ]);
    
            if($request->hasfile('prescripcion'))
            {
                $path = public_path().'/documentos-legales/' .  $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('prescripcion')->move($path,$request->file('prescripcion')->getClientOriginalName());
                $documentos['prescripcion'] = $request->file('prescripcion')->getClientOriginalName();
            }
            if($request->hasfile('advertencias'))
            {
                $path = public_path().'/documentos-legales/' .  $request->session()->get('trabajo-id');
                File::makeDirectory($path, $mode = 0755, true, true);          
                $request->file('advertencias')->move($path,$request->file('advertencias')->getClientOriginalName());
                $documentos['advertencias'] = $request->file('advertencias')->getClientOriginalName();
            }
           
            foreach($documentos as $indice =>$valor){
                $documento = new Documento();
                $documento->trabajo_id = $request->session()->get('trabajo-id');
                $documento->nombre = $indice;
                $documento->nombre_archivo = $valor;
                $documento->save();
            }
            return redirect()->route('trabajos.adjuntar-imagenes');
    }

    public function adjuntarImagenes(Request $request)
    {
       
        return view('trabajos.adjuntar-imagenes');
    }
    
}
