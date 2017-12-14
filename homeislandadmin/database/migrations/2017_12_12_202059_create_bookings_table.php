<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // gg
        Schema::defaultStringLength(191);                
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_booking');
            $table->string('total_price');
            $table->string('id_user');
            $table->string('id_homestay');
            $table->boolean('status');
            $table->string('nama_pemesan');
			$table->string('nama_homestay');
			$table->string('date_checkin');
			$table->integer('sum_menginap');
            $table->integer('sum_room');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
