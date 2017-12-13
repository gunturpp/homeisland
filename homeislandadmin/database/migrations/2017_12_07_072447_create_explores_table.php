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
            $table->string('kategori');
            $table->string('nama_tempat');
            $table->string('open_sale_hour');
            $table->string('open_sale_minute');
            $table->string('close_sale_hour');
            $table->string('close_sale_minute');
            $table->string('foto_1') ;            
            $table->string('foto_2') ;            
            $table->string('foto_3') ;            
            $table->string('alamat');
            $table->decimal('lat');
            $table->decimal('long');            
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
