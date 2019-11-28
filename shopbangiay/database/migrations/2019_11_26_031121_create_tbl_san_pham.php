<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table){ 
            $table->Increments('maSP');          
            $table->string('tenSP');
            $table->string('giaGoc');
            $table->string('giaBan');
            $table->string('moTa');
            $table->string('urlHinh');
            $table->integer('LOAI_SPmaLSP')->unsigned();
            $table->foreign('LOAI_SPmaLSP')->references('maSP')->on('san_pham');
            $table->integer('HANG_SXmaHSX')->unsigned();
            $table->foreign('HANG_SXmaHSX')->references('SAN_PHAMmaSP')->on('HANG_SX_SAN_PHAM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
