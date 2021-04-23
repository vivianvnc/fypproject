<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reservation;
use App\Parking;
use Illuminate\Support\Facades\Hash;
use Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaluser=User::count();  
        $totalres=Reservation::count();  //Total number of reservation
        $totalrestoday=Reservation::whereDate('created_at', Carbon\Carbon::today('Asia/Kuala_Lumpur'))->get()->count(); //Total reservation of today
        $pendingrestoday=Reservation::where('status',1)->whereDate('created_at', Carbon\Carbon::today('Asia/Kuala_Lumpur'))->count(); //total on-going reservation
        $cancelledrestoday=Reservation::where('status',2)->whereDate('created_at', Carbon\Carbon::today('Asia/Kuala_Lumpur'))->count();
        $completedrestoday=Reservation::where('status',3)->whereDate('created_at', Carbon\Carbon::today('Asia/Kuala_Lumpur'))->count();
        $recordrestoday=Reservation::whereDate('created_at', Carbon\Carbon::today('Asia/Kuala_Lumpur'))->get(); //records of today's reservation
        if($recordrestoday)
        {
            $recordrestoday->each(function($recordrestoday){
                $parkingID=$recordrestoday->parking_id;
                $parking=Parking::find($parkingID);
                $recordrestoday->level=$parking->level;
                $recordrestoday->parking_id=$parking->parking_id;

                $userID=$recordrestoday->userID;
                $user=User::find($userID);
                $recordrestoday->carplate = $user->carplate;
            });
        }else{
            
        }
        $date=Carbon\Carbon::today('Asia/Kuala_Lumpur');
        $data = [
            'user'=>$totaluser,
            'res'=>$totalres,
            'restoday'=>$totalrestoday,
            'pending'=>$pendingrestoday,
            'cancel'=>$cancelledrestoday,
            'success'=>$completedrestoday,
            'records'=>$recordrestoday,
            'today'=>$date
        ];
        return view('admin')->with('data',$data);

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
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z]+$/u',
            'email'=> 'required|email|unique:users,email',
            'cpassword'=>'required',
            'password'=>'required|same:cpassword',
            'carplate'=>'required|unique:users,carplate',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $hashed = Hash::make($request->password, [
            'rounds' => 6,
        ]);
        $user->password = $hashed;
        $user->carplate = $request->carplate;
        $user->admin = False;
        $user->save();

        return redirect('viewusers')->with('success','User added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userData = User::all();


        $users =[
            'users'=>$userData
        ];


        return view('viewusers',$users);
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchres(Request $request)
    {

        $search = $request->input('date');
        $result = Reservation::query()
        ->whereDate('created_at', 'LIKE', "%{$search}%")
        ->get();
        if($result){
            $result->each(function($result){
                $parkingID=$result->parking_id;
                $parking=Parking::find($parkingID);
                $result->level=$parking->level;
                $result->parking_id=$parking->parking_id;
                $userID=$result->userID;
                $user=User::find($userID);
                $result->carplate = $user->carplate;
            });
        }

        $searchres =[
            'searchres'=>$result
        ];

        return view('searchreservation',$searchres);

    }

    public function searchuser(Request $request)
    {
        $search = $request->input('search');
        $result = User::query()
        ->where('id', 'LIKE', "%{$search}%")
        ->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('carplate', 'LIKE', "%{$search}%")
        ->get();
        $users =[
            'users'=>$result
        ];
        // return $result;
        return view('searchuser',$users);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showReservation()
    {
        $resData= Reservation::get();

        if($resData){
            $resData->each(function($resData){
                $parkingID=$resData->parking_id;
                $parking=Parking::find($parkingID);
                $resData->level=$parking->level;
                $resData->parking_id=$parking->parking_id;
                $userID=$resData->userID;
                $user=User::find($userID);
                $resData->carplate = $user->carplate;
            });
        }

        return view('viewreservations')->with('res',$resData);
        // return $resData;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'e-name' => 'required',
            'e-email'=> 'required|email',
            'e-carplate'=>'required',
        ]);
        $userID=$request->input('selected-id');
        $name=$request->input('e-name');
        $email=$request->input('e-email');
        $carplate=$request->input('e-carplate');
        $usertype=$request->input('e-usertype');


        $updateUser = User::find($userID);
        $updateUser->name = $name;
        $updateUser->email = $email;
        $updateUser->carplate = $carplate;
        $updateUser->admin = $usertype;
        $updateUser->save();

        return redirect('viewusers')->with('success','Update successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $id=$request->input('userid');
       $user=User::find($id);
       $user->delete();
       return redirect('viewusers')->with('success','Update successfully!');
    }
}
