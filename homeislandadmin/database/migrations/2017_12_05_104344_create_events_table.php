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
            $table->string('date_start');                                
            $table->string('date_end');                                
            $table->text('deskripsi');                        
            $table->string('id_line');                                
            $table->string('id_ig');                                
            $table->string('web');                                
            $table->decimal('lat', 10, 7);
            $table->decimal('long', 10, 7);            
            $table->string('foto_1');                        
            $table->string('foto_2');                        
            $table->string('foto_3');                        
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
