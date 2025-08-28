<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToAdminAboutRider extends Mailable
{
    use Queueable, SerializesModels;
    public $rider_details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rider_details)
    {
        $this->rider_details = $rider_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lilac2xpress@support.info')->subject('New Rider Register')->view('mail.admin-mail-about-rider')->with('rider_details', $this->rider_details);
    }
}
