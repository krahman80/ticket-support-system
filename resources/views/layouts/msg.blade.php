@if ($errors->any())
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach       
@endif

@if (session('status'))
<p class="alert alert-success">{{ session('status') }}</p>
@endif
