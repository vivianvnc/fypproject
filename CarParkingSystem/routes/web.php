<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\FormController;
use App\Http\Controller\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::view('/','userlogin');

Route::view('/usersignup','usersignup');
Route::post('/usersignup','UserController@create');

Route::view('/userlogin','userlogin')->name('userlogin');
Route::post('/userlogin','UserController@index');

Route::get('/booking', 'ParkingController@index')->middleware('auth');
Route::post('/booking','ReservationController@store');

Route::get('/logout','UserController@logout');

Route::view('/levelselection','levelselection')->middleware('auth');

Route::view('/makereservation','makereservation')->middleware('auth'); 

Route::middleware('session.has.user')->group(function () {
    Route::get('/user',"UserController@dashboard")->middleware('auth'); 
    Route::post('/user','ReservationController@destroy');
    Route::get('/edit','UserController@edit')->middleware('auth');
    Route::post('/edit','UserController@update');
    Route::get('/reservation','UserController@show')->middleware('auth');

}); 

Route::middleware('session.has.admin')->group(function () {
    Route::get('/admin','AdminController@index')->middleware('auth');
    Route::get('/viewusers','AdminController@show')->middleware('auth');

    Route::view('/viewusers/search','searchreservation');
    Route::post('/viewusers/search','AdminController@searchuser');
    Route::post('/viewusers/search/add','AdminController@store');
    Route::post('/viewusers/search/edit','AdminController@update');
    Route::post('/viewusers/search/delete','AdminController@destroy');

    Route::post('/viewusers/edit','AdminController@update');
    Route::post('/viewusers/delete','AdminController@destroy');
    Route::post('/viewusers/add','AdminController@store');
    Route::get('/viewreservations','AdminController@showReservation')->middleware('auth');
    Route::post('/viewreservations','AdminController@searchres');
    Route::post('/viewreservations/search',"AdminController@searchres");

    
}); 



