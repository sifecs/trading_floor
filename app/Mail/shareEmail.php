<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class shareEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $share ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($share)
    {
        $this->share= $share;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.share',['share'=> $this->share]);
    }
}
