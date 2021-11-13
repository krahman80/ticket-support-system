@extends('layouts.app')
@section('title', 'Contact')
@section('content')
<div class="row py-5">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body p-4">
                <h5 class="card-title">Submit a new ticket</h5>
                @include('layouts.msg')                
                {!! Form::open(['route' => 'ticket.store']) !!}
                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('email', 'Email',['class'=>'control-label']); !!}
                            {!! Form::text('email', '', ['class'=>'form-control','id'=>'email', 'placeholder'=>'Email']); !!}
                        </div>
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
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
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

<script type="text/javascript">
    // $('#reload').click(function () {
    //     $.ajax({
    //         type: 'GET',
    //         url: ,
    //         success: function (data) {
    //             $(".captcha span").html(data.captcha);
    //         }
    //     });
    // });

    $(document).ready(function() {
        $('#reload').click(function() {
            $.ajax({
                type: 'get',
                url: '{{ route('reload.captcha') }}',
                success:function(data) {
                    $('.captcha span').html(data.captcha);
                }
            });
        });
    });
</script>

@endsection