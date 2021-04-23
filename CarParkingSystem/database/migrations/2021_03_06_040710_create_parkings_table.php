<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->bigIncrements('id'); // double check got PK ?
            $table->tinyInteger('level');
            $table->string('parking_id'); // add pk, php artisan:refresh
            $table->tinyInteger('status');

// level eg: A,B
// number eg: 1, 10

// A1 , B10

            // $table->boolean('status');
            // $table->boolean('is_occupied');
            // $table->boolean('is_reserved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkingstats');
    }
}
