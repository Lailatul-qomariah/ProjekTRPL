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
            $table->Integer('DesignerI');
            $table->string('NamaPaket', 50);
            $table->string('Kategori', 10);
            $table->string('JenisRuang', 20);
            $table->string('Luas', 10);
            $table->string('TinggiRuang', 10);
            $table->bigInteger('RangeHarga');
            $table->text('Keterangan');
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
