@extends('layouts.userdash')

@section('main-content')
<div class="container-fluid">
        @include('includes.alerts')
        <h1 class="mt-4">Edit Profile</h1>
        <div class="card-body">
                {{Form::open(['action'=>'UserController@update', 'method'=>'POST'])}}
                
                {{Form::label('name','Name',['class' => 'control-label']) }}
                {{Form::text('name',$user[0]->name,['class'=>'form-control '])}}
                @error('name')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                {{Form::label('email','E-mail address')}}
                {{Form::text('email',$user[0]->email,['class'=>'form-control','placeholder'=>'eg. abc@email.com'])}}
                @error('email')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                {{Form::label('cpassword','New password')}}
                <input type="password" name="cpassword" class="form-control">
                @error('cpassword')
                <div class="error">*{{ $message }}</div>
                @enderror
                {{-- {{Form::text('cpassword','',['class'=>'form-control'])}} --}}
                <br>
                {{Form::label('password','Re-type New password')}}
                <input type="password" name="password" class="form-control">
                @error('password')
                <div class="error">*{{ $message }}</div>
                @enderror
                {{-- {{Form::text('password','',['class'=>'form-control'])}} --}}
                <br>
                {{Form::label('carplate','Car Plate No.')}}
                {{Form::text('carplate',$user[0]->carplate,['class'=>'form-control', 'onkeyup'=>'this.value = this.value.toUpperCase();'])}}
                @error('carplate')
                <div class="error">*{{ $message }}</div>
                @enderror
                <br>
                <div class="row justify-content-center">
                {{Form::submit('Save',['class'=>'btn btn-primary', 'data-toggle'=>'button'])}}
                
                {{ Form::close() }}
        </div>
</div>

<script>
$(document).on('keydown', '.carplate', function(e) {
    if (e.keyCode == 32) return false;
});
</script>
@endsection