<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Reservation;
use Carbon;
use App\Parking;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check reservation status every minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $result=Reservation::where('status',1)->get();
        if ($result){
            $result->each(function($result){
                if($result->end_at < Carbon\Carbon::now()){
                    $result->status=2;
                    $result->save();
                    $parking=Parking::find($result->parking_id);
                    $parking->status=0;
                    $parking->save();
                }
            });
        }
    }
}
