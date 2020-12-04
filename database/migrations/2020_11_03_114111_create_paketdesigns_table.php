<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketdesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paketdesigns', function (Blueprint $table) {
            $table->bigIncrements('IdPaket');
            $table->string('NamaPaket');
            $table->string('Kategori');
            $table->string('JenisRuang');
            $table->string('Luas');
            $table->string('TinggiRuang');
            $table->bigInteger('RangeHarga');
            $table->string('Keterangan');
            $table->string('Gambar');
            $table->Integer('WaktuPembuatan');
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
        Schema::dropIfExists('paketdesigns');
    }
}
