<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToContactList extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $logo;
    public $new_message;
    public $template;
    public $username;
    public $url;
    public $image;
    public function __construct($subject, $logo, $image, $new_message, $template, $url, $username)
    {
        $this->new_message = $new_message;
        $this->subject = $subject;
        $this->logo = $logo;
        $this->template = $template;
        $this->username = $username;
        $this->url = $url;
        $this->image = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $message = $this->message;
        return $this->subject($this->subject)->view('emails.SendMailToContactList.templates./' . $this->template);
    }
}
