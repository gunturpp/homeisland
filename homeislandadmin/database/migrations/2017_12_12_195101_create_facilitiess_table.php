<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);        
        Schema::create('facilitiess', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('wifi');
            $table->boolean('parkir');
            $table->boolean('ac');
            $table->boolean('breakfast');
            $table->boolean('receptionist');
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
        Schema::dropIfExists('facilitiess');
    }
}
