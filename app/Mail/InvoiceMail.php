<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_data)
    {
        $this->order_data = $order_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Laptop World: Here you can download your invoice";
        return $this->markdown('emails.invoice')->subject($subject);
    }
}
