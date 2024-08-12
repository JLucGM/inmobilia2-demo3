<?php

namespace App\Notifications\Contact;

use App\Models\Contacto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactCreatedNotification extends Notification
{
    use Queueable;

    private $contact;

    public function __construct(Contacto $contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Contacto creada',
            'message' => 'Se ha creado una nuevo Contacto: ' . $this->contact->name .' '. $this->contact->apellido,
            'contact_id' => $this->contact->id,
        ];
    }
}
