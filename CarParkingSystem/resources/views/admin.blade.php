@extends('layouts.admindash')
@section('main-content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total number of users:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$data['user']}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total number of reservations:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$data['res']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h5>Today's reservation ({{$data['today']->format('d/m/Y')}}) :</h5>
            <br>
        </div>
            <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total number of reservations:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$data['restoday']}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">On-going Reservation</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$data['pending']}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Completed Reservation</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$data['success']}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Cancelled Reservation</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        {{$data['cancel']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
                                        <td> <?php 
                                        if($record->status==1){
                                            echo "<button type='button' class='btn btn-warning ' style='font-weight:bolder; pointer-events: none;'>On-going</button>";
                                        }else if($record->status==2){
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
    </div>
</main>
</div>
@endsection


