@extends('layouts.app')
@section('title','View a ticket')
@section('content')
<div class="col-lg-12 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-body p-4">
        <h5 class="card-title">Ticket Detail</h5>
        <div class="content">
            <h2 class="header">{{ $ticket->title }}</h2>
            <p><span class="font-weight-bold">Status</span>: {{ $ticket->status ? 'Answered' : 'Pending'}}</p>
            <p>{{ $ticket->content }}</p>
            </div>
                {!! Form::open(['route' => ['ticket.delete', $ticket->slug]]) !!}
                {{ link_to_route('ticket.edit', 'edit', ['slug' => $ticket->slug], ['class'=> 'btn btn-info']) }}                
                {!! Form::submit('delete', ['class' => 'btn btn-warning']) !!}
                {{-- </div> --}}
                {!! Form::close() !!}
                {{-- <a href="#" class="btn btn-info">Delete</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection