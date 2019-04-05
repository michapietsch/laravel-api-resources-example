<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFlightsTableAddTotalSeats extends Migration
{
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->unsignedInteger('total_seats')->nullable();
        });
    }
}
