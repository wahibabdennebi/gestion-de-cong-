<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ValidationConge extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $events;
    public $end_date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$events,$end_date)
    {   $this->user = $user;
        $this->events=$events;
        $this->end_date=$end_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('demandedeconge');
    }
}
