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
    public $order_track_id;
    public $order_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_track_id, $order_id)
    {
        $this->order_track_id = $order_track_id;
        $this->order_id = $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $from_name = "Laptop World";
        // $from_email = "laptopworld640@gmail.com";
        $subject = "Laptop World: Here you can download your invoice";
        return $this->markdown('emails.invoice')->subject($subject);
    }
}
