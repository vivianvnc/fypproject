<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id'); // double check got PK ?
            $table->string('userID');
            $table->boolean('status');
            $table->unsignedBigInteger('parking_id')->index();
            $table->timestamp('end_at');
            $table->timestamps();

            $table->foreign('parking_id')->references('id')->on('parkings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
