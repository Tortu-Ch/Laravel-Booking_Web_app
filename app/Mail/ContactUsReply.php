<?php
namespace App\Mail;
use App\Contactus;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class ContactUsReply extends Mailable
{
    use Queueable, SerializesModels;
    public $contact_us;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contactus $contact_us)
    {
        $this->contact_us = $contact_us;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reply');
    }
}