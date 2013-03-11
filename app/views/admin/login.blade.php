@extends('template')

@section('content')
<div class="main login">
    @if(Session::has('error'))
        <div class="error-box">
            <strong>Login Error :</strong>
            {{Session::get('error')}}
        </div>
    @endif
    {{$errors->first('email','<div class="error-box"><strong>Validation Error :</strong>:message</div>')}}
    {{$errors->first('password','<div class="error-box"><strong>Validation Error :</strong>:message</div>')}}
    {{Form::open()}}
    {{Form::label('email','E-mail')}}
    {{Form::email('email',Input::old('name'), array('placeholder' => 'Your stylish mail'))}}
    {{Form::label('password','Password')}}
    {{Form::password('password', array('placeholder' => 'Super-duper secret password'))}}
    {{Form::token()}}
    {{Form::button('Login',array("class"=>"btn btn-success btn-large"))}}
    {{Form::close()}}
</div>
@stop

@section('analytics')

@stop