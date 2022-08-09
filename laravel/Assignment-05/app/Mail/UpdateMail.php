<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateMail extends Mailable
{
    use Queueable, SerializesModels;
    public $movie;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.update-mail')
        ->subject('Movie Updated Notify Mail')
        ->with(['movie'=>$this->movie]);
    }
}
