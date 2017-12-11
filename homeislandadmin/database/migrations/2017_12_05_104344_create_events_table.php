<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);        
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin');                                
            $table->text('judul');
            $table->string('foto');                        
            $table->text('deskripsi');                        
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
        Schema::dropIfExists('events');
    }
}
