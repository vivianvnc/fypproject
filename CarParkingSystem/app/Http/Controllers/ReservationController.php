<?php

namespace App\Http\Controllers;

use Carbon;
use App\Parking;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = $request->session()->get('userID');           //Get User Details
        $parkingID = $request->input('selected-id');
        $parkID = DB::table('parkings')->where('parking_id','=',"{$parkingID}")->get();
        $parkingId = $parkID[0]->id;

        $currentTime = Carbon\Carbon::now('Asia/Kuala_Lumpur');
        $endTime = $currentTime->addMinutes(20);

        // $res = new Reservation;

        // $res->userID = $userID;
        // $res->status = 1;
        $reservation = Reservation::create([
            'userID'=>$userID,
            'status'=>1,
            'parking_id'=>$parkingId,
            'end_at'=>$endTime
        ]);

        $updateStatus = Parking::find($parkingId); //Update Parking Status
        $updateStatus->status = Reservation::PENDING;
        $updateStatus->save();

        return redirect('booking')->with('success','Reserved successful!');
    
        // debug(Reservation::SUCCESS);

        
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Reservation $reservation)
    {
        $updateRes = Reservation::find($request->input('resID'));
        $updateRes->status = 2;
        $updateRes->save();
        $updateParking = Parking::find($request->input('parkingID')); //Update Parking Status
        $updateParking->status = 0;
        $updateParking->save();
        $res=[
            'id'=>NULL
        ];
        // echo $request->input('resID');
        return redirect('user')->with('success','Your reservation has been cancelled successfully')->with('res',$res);
    }
}
