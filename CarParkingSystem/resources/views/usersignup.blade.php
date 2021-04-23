@extends('layouts.form', array('cardtitle'=>'Sign Up'))
  @section('form-content')
  @include('includes.alerts')
  <div class="card-header">Sign Up</div>
            <div class="col-md-10 offset-md-1">
              <div class="card-body">
                {{Form::open(['action'=>'UserController@create', 'method'=>'POST'])}}

                {{Form::label('name','Name')}}
                {{Form::text('name','',['class'=>'form-control ','placeholder'=>'Name'])}}
                @error('name')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                {{Form::label('email','E-mail address')}}
                {{Form::text('email','',['class'=>'form-control','placeholder'=>'eg. abc@email.com'])}}
                @error('email')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                {{Form::label('cpassword','Create password')}}
                <input type="password" name="cpassword" class="form-control" placeholder="Create passsword">
                @error('cpassword')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                {{Form::label('password','Re-type password')}}
                <input type="password" name="password" class="form-control" placeholder="Re-type passsword">
                @error('password')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                {{Form::label('carplate','Car Plate No.')}}
                {{Form::text('carplate','',['class'=>'form-control','placeholder'=>'eg. ABC1234', 'onkeyup'=>'this.value = this.value.toUpperCase();'])}}
                @error('carplate')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                <div class="row justify-content-center">
                {{Form::submit('Sign Up',['class'=>'btn btn-primary', 'data-toggle'=>'button'])}}
                {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>
        <br>
        Already have an account? Click here to <a href="/userlogin">Login!</a> 
<script>         
$(document).on('keydown', '#carplate', function(e) {
    if (e.keyCode == 32) return false;
});
</script>
@endsection