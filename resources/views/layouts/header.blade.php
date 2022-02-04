{{-- <header class="text-center text-white">
    <h1 class="display-4">Ticket Support System</h1>
    <p class="lead mb-0">build with laravel 7.29</p>
    <p class="font-italic">Css Snippet By
        <a href="https://bootstrapious.com" class="text-white">
            <u>Bootstrapious</u>
        </a>
    </p>
</header> --}}
<header class="text-center text-white">
    <h1 class="display-4">Ticket Support System</h1>
    <p class="lead mb-0">Build with <a href="https://laravel.com" class="text-white">laravel 7.29</a></p>
    <p class="font-italic">Snippet by <a href="https://bootstrapious.com" class="text-white">
        <u>Bootstrapious</u></a>
    </p>
    <p>
        @guest
            <a href="{{ route('home') }}" class="badge badge-pill badge-primary px-3 py-2">Home</a>
            <a href="{{ route('ticket.create') }}" class="badge badge-pill badge-primary px-3 py-2">Send Ticket</a>        
            <a href="{{ route('login') }}" class="badge badge-pill badge-primary px-3 py-2" >Login</a>
        @endguest
        @auth
        
            {!! Html::decode(link_to_route('ticket.index', 'All ticket', array(), array('class'=>'badge badge-pill badge-primary px-3 py-2'))) !!}
            <a class="badge badge-pill badge-primary px-3 py-2" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
    </p>
</header>