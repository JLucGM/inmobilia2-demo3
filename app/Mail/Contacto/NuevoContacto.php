<?php

namespace App\Mail\Contacto;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoContacto extends Mailable
{
    use Queueable, SerializesModels;

     public $user;
     public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public function __construct($contacto)
    {
         $this->user = $contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Contacto.NuevoContacto');

        return $this->markdown('emails.Contacto.NuevoContacto')->with('user', $this->user)->subject('Nuevo Contacto!');

    }
}
