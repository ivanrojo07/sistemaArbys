<?php

namespace App\Events;

use App\Cliente;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProspectoNuevo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $cliente;
    public $mensaje;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Cliente $cliente)
    {
        //
        $this->cliente=$cliente;
        if($cliente->tipo == 'Física')
            $this->mensaje = "El Cliente {$cliente->nombre} {$cliente->appaterno} {$cliente->apmaterno} a solicitado información";
        if($cliente->tipo == 'Moral')
            $this->mensaje = "El Cliente {$cliente->razon} a solicitado información";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('prospectos');
    }

    public function broadcastAs(){
        return 'prospecto-creado';
    }
}
