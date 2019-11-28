<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaisp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_sp', function (Blueprint $table){ 
            $table->Increments('maLSP');
            $table->string('tenLSP');
            $table->string('Mota');
            $table->integer('tinhtrang');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_sp');
    }
}
