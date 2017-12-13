<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomestaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::defaultStringLength(191);                
        Schema::create('homestays', function (Blueprint $table) {            
            $table->increments('id');
            $table->string('nama_homestay');
            $table->string('address');
            $table->decimal('price', 12, 2);
            $table->integer('kuota');
            $table->string('nama_pemesan');
			$table->string('nama_homestay');
			$table->string('date_checkin');
			$table->integer('sum_menginap');
            $table->integer('sum_room');            
            $table->string('foto_1') ;            
            $table->string('foto_2') -> nullable();            
            $table->string('foto_3') -> nullable();            
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
        Schema::dropIfExists('homestays');
    }
}
