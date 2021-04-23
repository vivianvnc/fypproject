@extends('layouts.userdash')
@section('main-content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <div class="row">
            <div class="col">
            <h5 class="mt-2"> Welcome {{ Auth::user()->name }} ! </h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <h5 class="mt-2">Car Plate No.: {{ Auth::user()->carplate }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <h5 class="mt-2">Email: {{ Auth::user()->email }} </h5>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Your reservation today
                    </div>
                    <div class="card-body">
                    @if(empty($res['id']))
                    <div class="row justify-content-start">
                        <div class="col-5">
                        <h4> You do not have any on-going reservation. </h4>
                        </div>
                        <div class="col-4">
                        <button id="reservation" type="button" class="btn btn-primary" onclick="location.href='{{ url('levelselection') }}'">+ Make New Reservation</button>
                        <div class="row">
                              &nbsp;
                        </div>
                        </div>
                    </div>
                    @else
                        <h2>On-going Reservation:</h2><br>
                        <h4>Level: {{$res['level']}}</h4><br>
                        <h4>Parking: {{$res['parking']}}</h4><br>
                        <h4>Date: {{$res['created_at']->format('d-m-Y')}}</h4>
                        <h4>Start At: {{$res->created_at->format('H:i')}}</h4>
                        <h4>End At: {{$res['end_at']->format('H:i')}} </h4>
                        <br> 
                        <button id="delete" type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteModal">Cancel Reservation</button>
                        @endif
                    </div>
                        </div>
                    </div>
                </div>
        </div>
</main>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
        </div>
        {{Form::open(['action'=>'ReservationController@destroy', 'method'=>'POST'])}}
            {{csrf_field()}}
            <input id="resID" value="{{$res['id']}}" type="hidden" name="resID">
            <input id="parkingID" value="{{$res['parking_id']}}" type="hidden" name="parkingID">
                <div class="modal-body">
                    Are you sure you want to cancel the reservation?
                </div>
                <div class="modal-footer">
                {{Form::submit('Yes',['class'=>'btn btn-danger', 'data-toggle'=>'button'])}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                {{ Form::close() }}
                </div>
    </div>
    </div>
</div>


    
                         
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
    $(".btn").click(function(event){
        $('#deleteModal').modal('show');
    });
    })
</script>
@endsection



        {{-- <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Today's reservations
                    </div>
                    <div class="card-body">
                        @if(empty($data['records'][0]->id))
                            No reservations have been made
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
                                    @foreach($data['records'] as $record)
                                    <tr>
                                        <td> {{$record->id}} </td>
                                        <td> {{$record->created_at->format('d-m-Y')}} </td>
                                        <td> {{$record->created_at->format('H:i')}} </td>
                                        <td> {{$record->end_at->format('H:i')}} </td>
                                        <td> {{$record->level}} </td>
                                        <td> {{$record->parking_id}} </td>
                                        <td> {{$record->carplate}} </td>

                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
</main>
</div> --}}


