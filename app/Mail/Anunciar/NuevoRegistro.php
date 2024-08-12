<?php

namespace App\Mail\Anunciar;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoRegistro extends Mailable
{
    use Queueable, SerializesModels;

     public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public function __construct($contacto,)
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
              return $this->markdown('emails.Anunciar.nuveoRegistro')->with('user',$this->user)->subject('Nuevo Registro');

    }
}
