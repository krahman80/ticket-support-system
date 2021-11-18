@extends('layouts.app')
@section('content')
<header class="text-center text-white">
    <h1 class="display-4">Ticket Support System</h1>
    <p class="lead mb-0">Build with <a href="https://laravel.com" class="text-white">laravel 7.29</a></p>
    <p class="font-italic">Snippet by <a href="https://bootstrapious.com" class="text-white">
        <u>Bootstrapious</u></a>
    </p>
</header>
<div class="row py-5">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body p-4 justify-content-center">                
                    <h5 class="card-title"><a href="{{ route('ticket.create') }}" class="badge badge-pill badge-primary px-3 py-2">Send Ticket</a></h5>
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
