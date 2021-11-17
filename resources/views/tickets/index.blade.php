@extends('layouts.app')
@section('title', 'Ticket')
@section('content')
<div class="row py-5">
    <div class="col-lg-12 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body p-4">
            <h5 class="card-title">Ticket</h5>
            @include('layouts.msg')
            @if (empty($tickets))
                <p> There is no ticket.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }} </td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->status ? 'Asnwered' : 'pending' }}</td>
                        <td>{!! link_to_route('ticket.show', 'update status', array('slug'=>$ticket->slug), array('class' => 'badge badge-pill badge-light px-3 py-2')) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
                    
        </div>
    </div>
    </div>
</div>
@endsection