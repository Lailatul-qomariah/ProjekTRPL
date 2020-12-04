<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatapaketdesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapaketdesigns', function (Blueprint $table) {
          $table->bigIncrements('idPaketRumah');
          $table->string('NamaPaketRumah');
          $table->string('KetegoriRumah');
          $table->string('LuasBangun');
          $table->string('JumlahLantai');
          $table->string('TinggiBangun');
          $table->string('JumlahKamar');
          $table->string('Keterangan');
          $table->bigInteger('RangeHarga');
          $table->Integer('WaktuPembuatan');
          $table->string('GamabarRumah');
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
        Schema::dropIfExists('datapaketdesigns');
    }
}
