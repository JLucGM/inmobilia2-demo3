<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCreatedNotification extends Notification
{
    use Queueable;

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Propiedad creada',
            'message' => 'Se ha creado una nueva propiedad: ' . $this->product->name,
            'product_id' => $this->product->id,
        ];
    }
}