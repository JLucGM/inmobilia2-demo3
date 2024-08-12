<?php

namespace App\Notifications\user;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserUpdatedNotification extends Notification
{
    use Queueable;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Usuario actualizado',
            'message' => 'Se ha actualizado el usuario: ' . $this->user->name .' ' . $this->user->last_name,
            'user_id' => $this->user->id,
        ];
    }
}
