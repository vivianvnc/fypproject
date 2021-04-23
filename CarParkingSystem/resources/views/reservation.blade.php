@extends('layouts.userdash')

@section('main-content')

<div class="container-fluid">
    <h1 class="mt-4">Reservations</h1>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
              Reservations History
            </div>
        </div>
    </div>
    <div class="card-body">
        <h6> You've made {{$res->num}} reservation(s) in the past.</h6>
        @if(empty($res[0]->id))

        @else
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"> Date </th>
                        <th scope="col"> Start Time </th>
                        <th scope="col"> End Time</th>
                        <th scope="col"> Parking Level</th>
                        <th scope="col"> Parking ID </th>
                        <th scope="col"> Status</th>
                    </tr>
                </thead>
                @foreach($res as $r)
                <tr>
                    <td> {{$r->created_at->format('d-m-Y')}} </td>
                    <td> {{$r->created_at->format('H:i')}} </td>
                    <td> {{$r->end_at->format('H:i')}} </td>
                    <td> {{$r->level}} </td>
                    <td> {{$r->parking_id}} </td>
                    <td> <?php 
                            if($r->status==1){
                                echo "<button type='button' class='btn btn-warning ' style='font-weight:bolder; pointer-events: none;'>On-going</button>";
                            }else if($r->status==2){
                                echo "<button type='button' class='btn btn-danger ' style='font-weight:bolder; pointer-events: none;'>Cancelled</button>";
                            }else{
                                echo "<button type='button' class='btn btn-success ' style='font-weight:bolder; pointer-events: none;'>Success</button>";
                            };
                            ?>
                    </td>
                </tr>
                @endforeach

            </table>
            @endif
        </div>
        
    </div>
</div>
</div>


@endsection