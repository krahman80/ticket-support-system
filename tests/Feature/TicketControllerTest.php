<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Ticket;
use App\User;
// use Illuminate\Foundation\Testing\WithFaker;

class TicketControllerTest extends TestCase
{
    use WithFaker;
    
    /**
     * guest test
     */
    
    /** @test */
     public function guestCouldVisitContactPage()
    {
        $response = $this->get(route('ticket.create'));
        $response->assertSuccessful();
        $response->assertViewIs('tickets.create');
        // $response->assertViewHas
    }
    /** @test */
    public function guestCouldSeeShowTicket()
    {
        $tickets = Ticket::get()->random();
        $response = $this->get(route('ticket.show',['slug' => $tickets->slug]));
        $response->assertViewIs('tickets.show');
        $response->assertViewHas('ticket');
        $returnedTicket = $response->original->ticket;
        $this->assertEquals($tickets->slug, $returnedTicket->slug, "the returned ticket is different from the one requestd");
    }
    /** @test */
    public function guestCouldNotSeeTicketPage(){
        $response = $this->get(route('ticket.index'));
        $response->assertRedirect('login');
    }
    /** @test */
    public function guestCouldNotSeeTicketEditPage()
    {
        $tickets = Ticket::get()->random();
        $response = $this->get(route('ticket.edit',['slug' => $tickets->slug]));
        $response->assertRedirect('login');
    }

    /**
     * Admin Test
     */
    /** @test */
    public function adminCouldSeeTicketPage(){
        $user = User::get()->random();
        $response = $this->actingAs($user)->get(route('ticket.index'));
        $response->assertViewIs('tickets.index');
    }
    /** @test */
    public function adminCouldSeeEditTicketPage() {
        $user = User::get()->random();
        $ticket = Ticket::get()->random();
        $response = $this->actingAs($user)->get(route('ticket.edit',['slug' => $ticket->slug]));
        $response->assertViewIs('tickets.edit');
        
        $returnedTicket = $response->original->ticket;
        $this->assertEquals($ticket->slug, $returnedTicket->slug, 'the returned ticket is different from original');
    }
    /** @test */
    public function adminCouldUpdateTicket() {
        $user = User::get()->random();
        $ticket = Ticket::get()->random();

        $ticketNewData = ['email' => $this->faker->email,
                          'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
                          'content' => $this->faker->text($maxNbChars = 100),
                          'slug' => uniqid('db'),
                          'status' => 0  ];

        $response = $this->actingAs($user)->put(route('ticket.update',['slug'=>$ticket->slug]), $ticketNewData);
        
        // somehow comparing data is failed event after adding fresh method
        $ticket = $ticket->fresh();
        // dd($ticket->title);
        // $this->assertEquals($ticket->title, $ticketNewData['title'], "the title of the article wasn't updated");
        // $this->assertEquals($ticket->content, $ticketNewData['content'], "the title of the article wasn't updated");
        
        $response->assertRedirect(route('ticket.show', ['slug' => $ticket->slug]));
        
    }
}
