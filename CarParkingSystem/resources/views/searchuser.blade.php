@extends('layouts.admindash')
@section('main-content')

<!-- AddModal -->
<div id="myModal">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add New User</h5>
          </div>
          {{Form::open(['url' => url('/viewusers/search/add'), 'method'=>'POST'])}}
                  <div class="modal-body">
                        {{csrf_field()}}
                        {{Form::label('name','Name',['class' => 'control-label']) }}
                        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
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
                        <input type="password" name="cpassword" class="form-control" placeholder="Create password">
                        @error('cpassword')
                        <div class="error">*{{ $message }}</div>
                        @enderror
                        <br>
                        {{Form::label('password','Re-type password')}}
                        <input type="password" name="password" class="form-control" placeholder="Re-type password">
                        {{-- {{Form::text('password','',['class'=>'form-control','placeholder'=>'Re-type password'])}} --}}
                        @error('password')
                        <div class="error">*{{ $message }}</div>
                        @enderror
                        <br>
                        {{Form::label('carplate','Car Plate No.')}} <small>Put "N" for Admin</small>
                        {{Form::text('carplate','',['class'=>'form-control','placeholder'=>'eg. ABC1234', 'onkeyup'=>'this.value = this.value.toUpperCase();'])}}
                        @error('carplate')
                        <div class="error">*{{ $message }}</div>
                        @enderror
                        <br>
                        {{Form::label('usertype','User Type')}}
                        {{Form::select('usertype', array('0'=>'User', '1'=>'Admin'),'', array('class'=>'form-control'))}}
                        <br>
                  </div>
                  <div class="modal-footer">
                  {{Form::submit('Add New User',['class'=>'btn btn-primary', 'data-toggle'=>'button', 'id'=>'addbtn'])}}
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
                  {{ Form::close() }}
              </div>
              </div>
            </div>
</div>
<script>         
    $(document).on('keydown', '#carplate', function(e) {
        if (e.keyCode == 32) return false;
    });
    $(document).on('keydown', '#e-carplate', function(e) {
        if (e.keyCode == 32) return false;
    });
</script>

<!-- EditModal -->
<div id="myModal">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit user data</h5>
          </div>
          {{Form::open(['url' => url('/viewusers/search/edit'), 'method'=>'POST'])}}
                 <input id="selected-id" type="hidden" name="selected-id">
                  <div class="modal-body">
                        {{csrf_field()}}
                        {{Form::label('e-name','Name',['class' => 'control-label']) }}
                        {{Form::text('e-name','',['class'=>'form-control '])}}
                        @error('e-name')
                        <div class="error">*{{ $message }}</div>
                        @enderror
                        <br>
                        {{Form::label('e-email','E-mail address')}}
                        {{Form::text('e-email','',['class'=>'form-control'])}}
                        @error('e-email')
                        <div class="error">*{{ $message }}</div>
                        @enderror
                        <br>
                        {{Form::label('e-carplate','Car Plate No.')}}
                        {{Form::text('e-carplate','',['class'=>'form-control', 'onkeyup'=>'this.value = this.value.toUpperCase();'])}}
                        @error('e-carplate')
                        <div class="error">*{{ $message }}</div>
                        @enderror
                        <br>
                        {{Form::label('e-usertype','User Type')}}
                        {{Form::select('e-usertype', array('0'=>'User', '1'=>'Admin'),'', array('class'=>'form-control'))}}
                        <br>
                  </div>
                  <div class="modal-footer">
                  {{Form::submit('Save',['class'=>'btn btn-primary', 'data-toggle'=>'button', 'id'=>'savebtn'])}}
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
                  {{ Form::close() }}
              </div>
              </div>
            </div>
    </div>
</div>

<!-- DeleteModal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
        </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                {{Form::open(['url' => url('/viewusers/search/delete'), 'method'=>'POST'])}}
                <input id="userid" type="hidden" name="userid">
                {{Form::submit('Delete',['class'=>'btn btn-danger', 'data-toggle'=>'button'])}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                {{ Form::close() }}
            </div>
    </div>
    </div>
</div>

<div class="container-fluid">
<!--Content-->
<h1 class="mt-4">Users</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        User Data
    </div>
    <div class="row" style="padding-top:20px; padding-left:20px;">
        <div class="col-3">
        {{Form::open(['action'=>'AdminController@searchuser', 'method'=>'POST'])}}
        {{Form::text('search','',['class'=>'form-control','placeholder'=>'Search...','type'=>'search'])}}
        </div>
        <div class="col-3">
        {{Form::submit('search',['class'=>'btn btn-primary', 'data-toggle'=>'button'])}}
        </div>
        {{Form::close()}}
        <div class="col-3 align-items-end">
            <button type="button" class="btn btn-primary addbtn" data-bs-toggle="modal" data-bs-target="#addModal">+ Add New User</button>
        </div>
    </div>
    <div class="card-body">
        @if($users!=NULL)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col"> Id</th>
                                <th scope="col"> Name</th>
                                <th scope="col"> Email </th>
                                <th scope="col"> Car Plate</th>
                                <th scope="col"> User Type</th>
                                <th scope="col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="userID"> {{$user->id}} </td>
                                <td class="name"> {{$user->name}} </td>
                                <td class="email"> {{$user->email}} </td>
                                <td class="carplate"> {{$user->carplate}} </td>
                                <td class="usertype"><?php
                                    if($user->admin==1){
                                        echo "Admin";
                                    }
                                    else{
                                        echo "User";
                                    }
                                    ?>
                                </td>
                                <td> <button id="{{$user->id}}" type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#editModal" data-userid="{{$user->id}}"
                                    data-name="{{$user->name}}" 
                                    data-email="{{$user->email}}"
                                    data-carplate="{{$user->carplate}}"
                                    data-usertype="{{$user->admin}}">Edit</button>
                                    <button id="{{$user->id}}" type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="{{$user->id}}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        @else
            <p>No Users </p>
            
        @endif
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    
<script>
    $(document).ready(function(){

        $(".editbtn").click(function(event){

            id = $(this).attr("data-userid");
            name = $(this).attr("data-name");
            email = $(this).attr("data-email");
            carplate = $(this).attr("data-carplate");
            usertype = $(this).attr("data-usertype");

            $("#selected-id").val(id);
            $('#e-name').val(name);
            $('#e-email').val(email);
            $('#e-carplate').val(carplate);
            $('#e-usertype').val(usertype);
            $('#editModal').modal('show');
        });
        
        // $("#editModal").validate({
        //     rules:{
        //         name:"required",
        //         email:"required",
        //         cpassword:"required",
        //         password:"required",
        //         carplate:"required",
        //     }
        // });
        $(".deletebtn").click(function(event){
            id = $(this).attr("data-userid");
            $("#userid").val(id);
            $(".modal-body").html("Are you sure you want to delete user ID. " + this.id + " ?"); 
            $('#deleteModal').modal('show');
        });
        $(".addbtn").click(function(event){
            $('#addModal').modal('show');
        });
        
    })
         
    $(document).on('keydown', '#carplate', function(e) {
        if (e.keyCode == 32) return false;
    });
</script>

</div>
@endsection