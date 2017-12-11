<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExploresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);        
        Schema::create('explores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin');                                
            $table->string('nama_wisata');
            $table->string('foto', 200) ;            
            $table->string('alamat', 191);
            $table->decimal('lang', 10, 7);
            $table->decimal('long', 10, 7);            
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
        Schema::dropIfExists('explores');
    }
}
