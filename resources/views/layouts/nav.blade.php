<header class="header mb-6">
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container"><a href="#" class="navbar-brand font-weight-bold">TiS System</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item active"><a href="#" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li> --}}
                    <li class="nav-item active">{!! Html::decode(link_to_route('home', 'home', array(), array('class'=>'nav-link text-uppercase font-weight-bold'))) !!}</li>
                    <li class="nav-item">{!! Html::decode(link_to_route('ticket.create', 'contact', array(), array('class'=>'nav-link text-uppercase font-weight-bold'))) !!}</li>
                </ul>
            </div>
        </div>
    </nav>
</header>
