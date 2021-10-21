<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Comentario;
use Auth;
use Illuminate\Support\Facades\Session;


class Comentarios extends Component
{
    public $mensaje;
    public $user_id;
    public $trabajo_id;  
  

    protected $rules = [
        'mensaje' => 'required', 
    ];

    public function render()
    {        
       // $comentarios = Comentario::latest()->get();  
       $comentarios = Comentario::where('trabajo_id',  session('trabajo_seleccionado'))->orderBy('created_at', 'desc')->get();     
        return view('livewire.comentarios', compact('comentarios'));
    }

    public function mount()
    {
        if(auth()->user()){
         //   $comentario = Comentario::where('user_id', auth()->user()->id)->first();
          //  if (!empty($comentario)) {
              ////$this->user_id = auth()->user()->id;
             //   $this->trabajo_id = $comentario->trabajo_id;
          //  }
        }
        return view('livewire.comentarios');
    }

    public function delete($id)
    {
     
    }

    public function comentario()
    {
        
        //$comentario = Comentario::where('user_id', auth()->user()->id)->first();
        
        $comentario = new Comentario;
        //$this->validate();
        $comentario->user_id = auth()->user()->id;
        $comentario->trabajo_id =  session('trabajo_seleccionado');
        $comentario->texto = $this->mensaje;
        if(auth()->user()->is_admin == 1)
            $comentario->is_admin = 1;
            
        try {
            $comentario->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        $this->mensaje ='';
        $this->render();
    }
}