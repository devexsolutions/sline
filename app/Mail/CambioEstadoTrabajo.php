<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Trabajo;

class CambioEstadoTrabajo extends Mailable
{
     /**
     * The trabajo instance.
     *
     * @var \App\Models\Trabajo
     */
    public $trabajo;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Trabajo $trabajo, String $nuevoEstado)
    {
        $this->trabajo = $trabajo;
        $this->nuevoEstado = $nuevoEstado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.trabajos.cambioestado')->with([
            'trabajo' => $this->trabajo, 
            'nuevoEstado' => $this->nuevoEstado,           
        ]);
    }
}
