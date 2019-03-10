<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommunityDeleted extends Mailable
{
    use Queueable, SerializesModels;

    public $community;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($community)
    {
        $this->community = $community;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.communityDeleted');
    }
}
