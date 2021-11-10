<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CambioEstadoTrabajo as CambioEstadoTrabajoMail;
use Illuminate\Support\Facades\Mail;
use Log;
 
use App\Models\Trabajo;
use App\Events\CambioEstadoTrabajo;

class EnviarEmailCambioEstado
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
     * @param  CambioEstadoTrabajo  $event
     * @param  App\Models\Trabajo  $trabajo
     * @return void
     */
    public function handle(  CambioEstadoTrabajo $event )
    {
       /* Log::info("Entro en el Manejador del Listener"); 
        $data = array('name' => $event->user->nombre, 
                      'email' => $event->user->email, 
                      'body' => 'El trabajo número'. $event->idTrabajo .'ha cambiado su estado a '. $event->nuevoEstado);
        Log::info("Data ". json_encode($data));
       // Mail::to('emails.mail')->send(new CambioEstadoTrabajoMail());              
        Mail::send('emails.trabajos.cambioestado', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Cambio estado de trabajo');
            $message->from('info@slineinvisible.com');
        });*/
       
        Mail::to('jacampossegura@gmail.com')->send(new CambioEstadoTrabajoMail($event->trabajo));    

    }
}
