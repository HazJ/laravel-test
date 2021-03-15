<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Order;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = Order::where('id', $order->id)->with('items')->first();
    }

    public function build()
    {
        return $this->markdown('orders.emails.confirmation');
    }
}
