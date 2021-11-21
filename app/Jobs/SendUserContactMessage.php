<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\UserContactMessage;
use Illuminate\Support\Facades\Mail;

class SendUserContactMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $slug;
    private $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($slug, $email)
    {
        $this->slug = $slug;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('Tis-inbox@mailtrap.com')->send(new UserContactMessage($this->slug,$this->email));
    }
}
