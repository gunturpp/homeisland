<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSouvenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);        
        Schema::create('souvenirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin');                                
            $table->string('nama_toko');
            $table->string('open_sale_hour');
            $table->string('open_sale_minute');
            $table->string('close_sale_hour');
            $table->string('close_sale_minute');
            $table->string('alamat');
            $table->decimal('lat', 10, 7);
            $table->decimal('long', 10, 7);            
            $table->string('foto_1', 200) ;            
            $table->string('foto_2', 200) ;            
            $table->string('foto_3', 200) ;            
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
        Schema::dropIfExists('souvenirs');
    }
}
