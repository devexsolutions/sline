<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

use Log;

class CambioEstadoTrabajo
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $nuevoEstado;
    public $user;
    public $idTrabajo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( String $nuevoEstado, User $user, int $idTrabajo)
    {
        Log::info("Entro en el constructor del Evento"); 
        $this->nuevoEstado = $nuevoEstado;
        $this->user = $user;
        $this->idTrabajo = $idTrabajo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
