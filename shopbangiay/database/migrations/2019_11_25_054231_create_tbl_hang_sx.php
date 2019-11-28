<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHangSx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('hang_sx', function (Blueprint $table){ 
            $table->Increments('maHSX');
            $table->string('tenHSX');
            $table->string('diaChi');
            $table->string('email');
            $table->string('nguoiDaiDen');
            $table->string('dienThoai');
            $table->string('Mota');
            $table->integer('tinhTrang');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('hang_sx');
    }
}
