<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GetQuote extends Mailable
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
        if($this->array['file'] != null){

            return $this->from('info@homespecsolution.co.uk', 'Home Spaces Solution')
            ->subject('New mail form Home Spaces Solution')
            ->replyTo($this->array['email'])
            ->attach($this->array['file'],['as'=>$this->array['file_name'], 'mime'=>'application/jpg/jpeg/mp4'])
            ->markdown('emails.getquote');

        }else{

            return $this->from('info@homespecsolution.co.uk', 'Home Spaces Solution')
            ->subject('New mail form Home Spaces Solution')
            ->replyTo($this->array['email'])
            ->markdown('emails.getquote');

        }

    }
}
