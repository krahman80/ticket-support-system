<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $slug;
    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($slug, $email)
    {
        $this->slug = $slug;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact-page@tis.app')
        ->subject('Your Message Sent')
            ->markdown('emails.userTicket')
            ->with([
                'name' => $this->email,
                'slug' => $this->slug,
            ]);
    }
}
