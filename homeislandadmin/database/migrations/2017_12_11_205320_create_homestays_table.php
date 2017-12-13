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
            $table->string('admin');
            $table->string('kabupaten');
            $table->string('nama_homestay');
            $table->decimal('price', 12, 2);
            $table->integer('no_rek');
            $table->integer('kuota');
            $table->integer('id_fasilitas', 11);
            $table->integer('id_rating', 11);
            $table->string('address');
            $table->decimal('lat', 10, 7);
            $table->decimal('long', 10, 7);
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
