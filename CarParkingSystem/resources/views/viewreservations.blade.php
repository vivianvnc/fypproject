@extends('layouts.admindash')
@section('main-content')

<div class="container-fluid">
<!--Content-->
<h1 class="mt-4">Reservations</h1>
<div class="card mb-4">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-4">
              Reservation Data
            </div>
            <div class="col-3 align-self-end">
            {{Form::open(['action'=>'AdminController@searchres', 'method'=>'POST'])}}
            {{-- {{Form::text('search','',['class'=>'form-control','placeholder'=>'Search...','type'=>'search'])}}--}}
            {{ Form::date('date', '', array('class' => 'datepicker','id' => 'datepicker')) }}  
            {{Form::submit('Search',['class'=>'btn btn-primary', 'data-toggle'=>'button'])}}
            </div>
            {{Form::close()}}
        </div>
        
    </div>
    <div class="card-body">
        @if(empty($res[0]['id']))
            No reservations have been made.
        @else
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"> Id</th>
                        <th scope="col"> Date </th>
                        <th scope="col"> Start Time </th>
                        <th scope="col"> End Time</th>
                        <th scope="col"> Parking Level</th>
                        <th scope="col"> Parking ID </th>
                        <th scope="col"> Car Plate</th>
                        <th scope="col"> Status</th>
                    </tr>
                </thead>
                @foreach($res as $r)
                <tr>
                    <td> {{$r->id}} </td>
                    <td> {{$r->created_at->format('d-m-Y')}} </td>
                    <td> {{$r->created_at->format('H:i')}} </td>
                    <td> {{$r->end_at->format('H:i')}} </td>
                    <td> {{$r->level}} </td>
                    <td> {{$r->parking_id}} </td>
                    <td> {{$r->carplate}} </td>
                    <td> <?php 
                    if($r->status==1){
                        echo "<button type='button' class='btn btn-warning ' style='font-weight:bolder; pointer-events: none;'>On-going</button>";
                    }else if($r->status==2){
                        echo "<button type='button' class='btn btn-danger ' style='font-weight:bolder; pointer-events: none;'>Cancelled</button>";
                    }else{
                        echo "<button type='button' class='btn btn-success ' style='font-weight:bolder; pointer-events: none;'>Success</button>";
                    }
                    ?></td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif
    </div>
</div>
</div>
</div>

@endsection