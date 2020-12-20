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
          $table->Integer('DesignerR');
          $table->string('NamaPaketRumah', 50);
          $table->string('KetegoriRumah', 10);
          $table->string('LuasBangun', 10);
          $table->Integer('JumlahLantai');
          $table->string('TinggiBangun', 10);
          $table->Integer('JumlahKamar');
          $table->text('Keterangan');
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
