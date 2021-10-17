<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CambioEstadoTrabajo as CambioEstadoTrabajoMail;
use Illuminate\Support\Facades\Mail;
 

use App\Events\CambioEstadoTrabajo;

class EnviarEmailCambioEstado
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        Log::info("Entro en el constructor del Listener"); 
    }

    /**
     * Handle the event.
     *
     * @param  CambioEstadoTrabajo  $event
     * @return void
     */
    public function handle(CambioEstadoTrabajo $event)
    {
        Log::info("Entro en el Manejador del Listener"); 
        $data = array('name' => $event->user->name, 
                      'email' => $event->user->email, 
                      'body' => 'El trabajo número $event->idTrabajo ha cambiado su estado a $event->nuevoEstado.');
 
       // Mail::to('emails.mail')->send(new CambioEstadoTrabajoMail());              
        Mail::send('emails.mail', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Cambio estado de trabajo');
            $message->from('info@slineinvisible.com');
        });
    }
}
