<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CambioEstadoTrabajo as CambioEstadoTrabajoMail;
use Illuminate\Support\Facades\Mail;
use Log;
 
use App\Models\Trabajo;
use App\Models\Notification;
use App\Events\CambioEstadoTrabajo;
use Auth;
use DB;

class EnviarNotificacionCambioEstado
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
        Log::info("Entro en el Manejador del Listener Enviar Email"); 
        
        $trabajo_ = $event->trabajo;
        // Notificacion al usuario 
        $notificacion = new Notification();
        $notificacion->trabajo_id = $trabajo_->id;
        $notificacion->user_id = Auth::user()->id;
        $notificacion->texto = $event->nuevoEstado;
        $notificacion->save();
        
         // Notificacion al administrador
         $users = DB::table('users')        
         ->where('is_admin', '=', true)
         ->get(); 
         //dd($trabajo_);
         foreach ($users as $key => $user) {
            $notificacion = new Notification();
            $notificacion->trabajo_id = $trabajo_->id;
            $notificacion->user_id = $user->id;
            $notificacion->texto = $event->nuevoEstado;
            $notificacion->save();
         }
        

    }
}
