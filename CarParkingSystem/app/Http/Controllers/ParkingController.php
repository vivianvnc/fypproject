<?php

namespace App\Http\Controllers;

use App\Parking;
use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon;
use Response;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userID = Auth::user()->id;   
        $reservationToday = Reservation::where('userID',"{$userID}")
        ->where('status',1)
        ->whereDate('created_at', Carbon\Carbon::today('Asia/Kuala_Lumpur'))
        ->first();

        if($reservationToday){
           $ongoing = TRUE;
           $json=Response::json(array("ongoing"=>"yes"));
        }else{
            $ongoing = FALSE;
        }
        $parkings= DB::table('parkings')->get();
        $parkings->each(function($parking){
            if($parking->status==0){
                $parking->class = "green-box";
            }else if($parking->status==1){
                $parking->class = "yellow-box";
            }else if($parking->status==2){
                $parking->class = "red-box";
            }
        });
        
        $result = [
            "parkings" => $parkings,
            "ongoing" => $ongoing,
            
        ];

        return view('booking',$result);
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
        // $data = $request->parkingID;
        // return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function show(Parking $parking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function edit(Parking $parking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parking $parking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parking $parking)
    {
        //
    }
}
