<?php

namespace App\Notifications\user;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserDeleteNotification extends Notification
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
            'title' => __('notifications.user_deleted_title'),
            'message' => __('notifications.user_deleted_message', [
                'name' => $this->user->name,
                'last_name' => $this->user->last_name,
            ]),
            'user_id' => $this->user->id,
        ];
    }
}
