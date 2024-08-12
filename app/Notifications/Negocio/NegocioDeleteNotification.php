<?php

namespace App\Notifications\Negocio;

use App\Models\Negocio;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NegocioDeleteNotification extends Notification
{
    use Queueable;

    private $negocio;

    public function __construct(Negocio $negocio)
    {
        $this->negocio = $negocio;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Negocioo eliminado',
            'message' => 'Se ha eliminado una nuevo negocio: ' . $this->negocio->name,
            'negocio_id' => $this->negocio->id,
        ];
    }
}
