<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = ['level', 'parking_id','status'];
    public $timestamps = false;
    // public function reservation(){
    //     return $this->hasMany('App\Reservation');
    // }
    //  relation eloquent one-many

}
