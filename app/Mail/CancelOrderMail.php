<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancelOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orders;
    public $orderitems;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders, $orderitems)
    {
        $this->orders = $orders;
        $this->orderitems = $orderitems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.cancelOrder');
    }
}
