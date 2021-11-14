<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use Captcha;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    //
    public function create(){
        return view('tickets.create');
    }

    public function store(TicketFormRequest $request) {
        
        $request->validated();
        
        $slug = uniqid('db');
        // $slug = random_bytes(16);
        
        $ticket = new Ticket(array(
            'email' => $request->get('email'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug
            ));
        $ticket->save();
        
        // send email here
        Mail::to('Tis-inbox@mailtrap.com')->send(new ContactMessage($slug));
        
        //return to view
        return redirect('contact')->with('status', 'Your ticket has been created! I\'ts unique id is: '.$slug);
        
        // return view('tickets.create')->with('status', 'Your ticket has been created! It\'s unique id is: '. $slug);
        // @if(!empty($status))
        // <div class="alert alert-success"> {{ $status }}</div>
        // @endif

    }

    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }
}
