<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HomeContact extends Mailable
{
    use Queueable, SerializesModels;
    public $array;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $this->array = $array;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@homespecsolution.co.uk', 'Home Spaces Solution')
        ->subject('New mail form Home Spaces Solution')
        ->replyTo($this->array['email'])
        ->markdown('emails.home-contact');
    }
}
