@extends('layouts.userdash')

@section('main-content')

<div class="container-fluid">
    <h1 class="mt-4">Make Reservation</h1>
    <h6>Click the button below to view parking space status and make reservation:</h6>
    <button class="btn btn-primary" onclick="window.location='{{ url('levelselection') }}'"> Parking Level Selection</button>
</div>


@endsection