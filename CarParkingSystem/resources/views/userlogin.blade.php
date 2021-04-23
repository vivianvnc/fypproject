@extends('layouts.form')
  @section('form-content')
  <div class="card-header">Login</div>
    <div class="col-md-10 offset-md-1">
      <div class="card-body">
        {{Form::open(['action'=>'UserController@index', 'method'=>'POST'])}}
        {{csrf_field()}}
        {{Form::label('email','E-mail address')}}
        {{Form::text('email','',['class'=>'form-control','placeholder'=>'eg. abc@email.com'])}}
        @error('email')
            <div class="error">*{{ $message }}</div>
        @enderror
        <br>
        {{Form::label('password','Password')}}
        <input type="password" name="password" class="form-control" placeholder="Passsword">
        @error('password')
            <div class="error">*{{ $message }}</div>
        @enderror
        <br>
        <div class="row justify-content-center">
        {{Form::submit('Login',['class'=>'btn btn-primary', 'data-toggle'=>'button'])}}
        </div>
        <br>
        {{ Form::close() }}
        </div>
      </div>
    </div>
    <br>
    If you do not have an account, click here to <a href="/usersignup">Sign Up!</a>          
  </div>
 @endsection