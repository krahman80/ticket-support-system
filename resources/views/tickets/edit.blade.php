@extends('layouts.app')
@section('title', 'Contact')
@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit ticket</h5>
                    @include('layouts.msg')
                    {!! Form::model($ticket,['method' => 'put', 'route' => ['ticket.update', $ticket->slug]]) !!}
                    <div class="form-group">
                            {!! Form::hidden('slug', $ticket->slug) !!}
                            {!! Form::label('email', 'Email',['class'=>'control-label']); !!}
                            {!! Form::text('email', null, ['class'=>'form-control','id'=>'email', 'placeholder'=>'Email', 'disabled']); !!}
                        </div>
                        <fieldset class="form-group border p-3" disabled>
                            <legend class="w-auto px-2">Message</legend>
                        <div class="form-group">
                            {!! Form::label('title', 'Title',['class'=>'control-label']); !!}
                            {!! Form::text('title', null, ['class'=>'form-control','id'=>'title', 'placeholder'=>'Title']); !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Content', ['class'=>'control-label']); !!}
                            {!! Form::textarea('content', null, ['class'=>'form-control','rows'=>'3', 'id'=>'content']); !!}
                        </div>
                        </fieldset>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status" {!! $ticket->status ? "checked" : "" !!} > Close this ticket?
                            </label>
                        </div>
                        {!! Form::submit('save',['class'=>'btn btn-primary'])!!}
                    {!! Form::close(); !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection