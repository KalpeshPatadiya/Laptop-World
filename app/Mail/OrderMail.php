<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order_data;
    public $cartitems;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_data, $cartitems)
    {
        $this->order_data = $order_data;
        $this->cartitems = $cartitems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');

        $from_name = "Laptop World";
        $from_email = "laptopworld640@gmail.com";
        $subject = "Laptop World: Thank you for shopping with us";
        return $this->from($from_email, $from_name)->view('emails.order')->subject($subject);
    }
}
