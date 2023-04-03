<?php

namespace Kayise\Test\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $testimony;
    /**
     * Create a new message instance.
     */
    public function __construct($testimony)
    {
        $this-> testimony= $testimony;
    }

    /**
     * Get the message envelope.
     */
    

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->markdown('test::test.email')->with(['testimony' => $this->testimony]);
    }

   
}
