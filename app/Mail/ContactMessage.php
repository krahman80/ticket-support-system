<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;
    
    private $slug;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('contact-page@tis.app')
        ->subject('New Contact Message')
            ->markdown('emails.ticket')
            ->with([
                'name' => 'Tis Admin',
                'slug' => $this->slug,
            ]);
    }
}
