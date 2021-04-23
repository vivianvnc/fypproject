<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    const PENDING = 1;
    const CANCEL = 2;
    const SUCCESS = 3;

    use softDeletes;

    protected $fillable = ['userID', 'parking_id','status','end_at'];
    protected $dates = ['end_at'];
    protected $softDelete = TRUE;
    // public const STATUS = [
    //     self::PENDING => "1",
    //     self::CANCEL => "bb",
    //     self::SUCCESS => "bcc",
    // ];
    // protected $appends = [
    //     'status_name',
    // ];

    // // appends
    // public function getStatusNameAttribute()
    // {   
    //     if(isset($this->attributes['status'])){
    //         return self::STATUS[$this->attributes['status']] ?? 'N/A';
    //     }
    // }

    // public function parking(){
    //     return $this->belongsTo('App\Parking');
    // }

    public function user(){
        return $this->belongstTo(User::class);
    }

}
