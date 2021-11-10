<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CambioEstadoTrabajo as CambioEstadoTrabajoMail;
use Illuminate\Support\Facades\Mail;
use Log;
 
use App\Models\Trabajo;
use App\Models\Historico;
use App\Events\CambioEstadoTrabajo;
use Auth;
use DB;

class EnviarHistoricoCambioEstado
{
    public $trabajo;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Trabajo $trabajo)
    {
        Log::info("Entro en el constructor del Listener"); 
        $this->trabajo = $trabajo;
    }

    /**
     * Handle the event.
     *
     * @param  CambioEstadoTrabajo $event     
     * @return void
     */
    public function handle( CambioEstadoTrabajo $event)
    {
        Log::info("Entro en el Manejador del Listener Historico"); 
        
        $trabajo_ = $event->trabajo;        
        $historico = new Historico();
        $historico->trabajo_id = $trabajo_->id;
        $historico->user_id = Auth::user()->id;
        $historico->operacion = $event->nuevoEstado;
        $historico->save();

    }
}
