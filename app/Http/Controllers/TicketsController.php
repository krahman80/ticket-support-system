<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use Captcha;
use App\Jobs\SendContactMessage;

class TicketsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth')->except('create','show');
    }

    public function index() {
        $tickets = Ticket::orderBy('id', 'desc')->paginate(10);
        return view('tickets.index',['tickets' => $tickets]);    
    }

    public function show($slug) {
        // this return collection need to foreach in the view
        // $ticket = Ticket::where('slug',$slug)->get();

        $ticket = Ticket::where('slug',$slug)->firstOrFail();
        return view('tickets.show', ['ticket' => $ticket]);
    }

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
        
        // send email to notify admin
        SendContactMessage::dispatch($slug);

        //send email to notify sender

        
        //return to view
        return redirect('contact')->with('status', 'Your ticket has been created! I\'ts unique id is: '.$slug);
        
        // return view('tickets.create')->with('status', 'Your ticket has been created! It\'s unique id is: '. $slug);
        // @if(!empty($status))
        // <div class="alert alert-success"> {{ $status }}</div>
        // @endif

    }

    public function edit($slug){
        $ticket = Ticket::where('slug',$slug)->first();
        return view('tickets.edit',['ticket' => $ticket]);
    }

    public function update(Request $request, $slug) {
        $ticket = Ticket::where('slug', $slug)->firstOrFail();
        
        if ($request->get('status') != null ){
            $ticket->status = 1;
        } else {
            $ticket->status = 0;
        }
        $ticket->save();

        // return redirect('ticket',['slug' => $ticket->slug])->with('status', 'update success');
        return redirect()->action('TicketsController@edit', array('slug'=>$ticket->slug))->with('status', 'ticket updated');
    }

    public function destroy($slug) {
        $ticket = Ticket::where('slug', $slug)->firstOrFail();
        $ticket->delete();
        return redirect('ticket')->with('status', 'The ticket '. $ticket->slug . ' has been deleted');
    }

    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }
}
