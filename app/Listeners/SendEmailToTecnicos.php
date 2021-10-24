<?php

namespace App\Listeners;

use App\Events\CambioEstadoTrabajo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToTecnicos
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CambioEstadoTrabajo  $event
     * @return void
     */
    public function handle(CambioEstadoTrabajo $event)
    {
        //
    }
}
