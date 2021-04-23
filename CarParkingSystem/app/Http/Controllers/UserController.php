<?php

namespace App\Http\Controllers;

use Carbon;
use App\User;
use App\Reservation;
use App\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $this->validate($request, [         //login
            'email' => 'required|email',
            'password'=> 'required'
            ]); 
        $userData = array(
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        );

        $request->session()->put('email',$request->get('email'));

        if(Auth::attempt($userData)){
            
            $userEmail=session('email');
            $userData=DB::table('users')->where('email','=',"{$userEmail}")->get();
            $name =  Auth::user()->name;
            $carplate = Auth::user()->carplate;
            $request->session()->put('userID',Auth::user()->id);
            $value = $request->session()->get('userID');
            if(Auth::user()->admin==True){
                $request->session()->put('admin', True);
                return redirect('admin');
            }else{
                $request->session()->put('user', True);
                return redirect('levelselection');
            }
        }
        else{
            return back()->with('main-error','Incorrect email or/and password!');
        };        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [    
            'name' => 'required|regex:/^[a-zA-Z]+$/u',
            'email'=> 'required|email|unique:users,email', 
            'cpassword'=>'required',
            'password'=>'required|same:cpassword',
            'carplate'=>'required|regex:/^[\w-]*$/|unique:users,carplate',
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

        return redirect('userlogin')->with('success','Sign up successful! Please login to continue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,User $user)
    {
      
        $userID = Auth::user()->id;
        // print_r($reservationToday);
        $resData = Reservation::where('userID',$userID)->get();
        if($resData){
            $num = Reservation::where('userID',$userID)->count();
            $resData->num = $num;
            $resData->each(function($resData){
                $parkingID=$resData->parking_id;
                $parking=Parking::find($parkingID);
                $resData->level=$parking->level;
                $resData->parking=$parking->parking_id;
            });
        }else{
            $resData->num = 0;
        }
       return view('reservation')->with('res',$resData);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $userEmail=session('email');
        $user=DB::table('users')->where('email','=',"{$userEmail}")->get();
        $name =  Auth::user()->name;
        $email = Auth::user()->email;
        $carplate = Auth::user()->carplate;
        $value = $request->session()->get('userID');

        return view('edit',[ 'user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [ 
            'name' => 'required|regex:/^[a-zA-Z]+$/u',
            'email'=> 'required|email',
            'cpassword'=>'required',
            'password'=>'required|same:cpassword',
            'carplate'=>'required',
        ]);

        $userID = $request->session()->get('userID');   
        $name= $request->input('name');
        $email=$request->input('email');
        $password=Hash::make($request->input('password'), [
            'rounds' => 6,
        ]);
        $carplate=$request->input('carplate');

        $updateUser = User::find($userID); //Update User
        $updateUser->name = $name;
        $updateUser->email = $email;
        $updateUser->password = $password;
        $updateUser->carplate = $carplate;
        $updateUser->save();

        $hashed = Hash::make($request->password, [
            'rounds' => 6,
        ]);

        $user=DB::table('users')->where('id','=',"{$userID}")->get();
        Session::get('email');
        Session::put('email',$email);

        
        return view('/edit',['user'=>$user])->with('success','Data has been update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
    }

    public function dashboard()
    {
        $userID = Auth::user()->id;   
        $reservationToday = Reservation::where('userID',"{$userID}")
        ->where('status',1)
        ->whereDate('created_at', Carbon\Carbon::today('Asia/Kuala_Lumpur'))
        ->first();

        if($reservationToday){
            $parkingID=$reservationToday->parking_id;
            $parking = Parking::find($parkingID);
            $reservationToday->level = $parking->level;
            $reservationToday->parking = $parking->parking_id;
        }
        return view('user')->with('res',$reservationToday);
    }
    
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/userlogin');
    }


}
