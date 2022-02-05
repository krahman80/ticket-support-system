@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-body p-4">
                    <h5 class="card-title">Submit a new ticket</h5>
                    @include('layouts.msg')                
                    {!! Form::open(['route' => 'ticket.store']) !!}
                        
                            <div class="form-group">
                                {!! Form::label('email', 'Email',['class'=>'control-label']); !!}
                                {!! Form::text('email', '', ['class'=>'form-control','id'=>'email', 'placeholder'=>'Email']); !!}
                            </div>
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2">Message</legend>
                            <div class="form-group">
                                {!! Form::label('title', 'Title',['class'=>'control-label']); !!}
                                {!! Form::text('title', '', ['class'=>'form-control','id'=>'title', 'placeholder'=>'Title']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', 'Content', ['class'=>'control-label']); !!}
                                {!! Form::textarea('content', '', ['class'=>'form-control','rows'=>'3', 'id'=>'content']); !!}
                                <span class="help-block">Feel free to ask us any question.</span>
                            </div>

                            <div class="form-group">
                                <div class="captcha">
                                    <span id="recaptcha">{!! captcha_img() !!}</span>
                                    {{-- <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button> --}}
                                    {!! Form::button('Reload!',['class'=>'btn btn-danger reload','id' => 'reload']); !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::text('captcha', '', ['class'=>'form-control','id'=>'captcha', 'placeholder'=>'Enter Captcha']); !!}
                            </div>

                            <div class="form-group">    
                                {{-- {!! Form::Submit('Cancel!',['class'=>'btn btn-default btn-sm']); !!} --}}
                                {!! Form::submit('Submit!',['class'=>'btn btn-primary btn-sm']); !!}
                            </div>
                        </fieldset>
                        {!! Form::close(); !!}
                </div>
            </div>                
        </div>
    </div>
    <captcha-component recaptcha-route="{{ route('reload.captcha') }}"></captcha-component>
</div>
@endsection