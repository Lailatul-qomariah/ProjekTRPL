<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanandesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanandesigns', function (Blueprint $table) {
            $table->bigIncrements('IdPesanan');
            $table->bigInteger('IdPaket')->unsigned()->nullable();
            $table->bigInteger('IdPaketRumah')->unsigned()->nullable();
            $table->bigInteger('IdUSer')->unsigned()->nullable();
            $table->string('PaymentToken')->nullable();
            $table->string('PaymentUrl')->nullable();
            $table->string('Jenisruangan', 50)->nullable();
            $table->string('Luasruangan', 10)->nullable();
            $table->string('TinggiRuangan', 10)->nullable();
            $table->string('LuasBangunan', 10)->nullable();
            $table->Integer('JumlahLantai')->nullable();
            $table->string('TinggiBangunan', 10)->nullable();
            $table->Integer('JumlahKamar')->nullable();
            $table->Integer('Hargatotal')->nullable();
            $table->string('Gambar')->nullable();
            $table->text('Keterangan')->nullable();
            $table->enum('StatusPembayaran', ['Belum', 'Sudah']);
            $table->enum('StatusPesanan',['Belum','Proses','Selesai', 'Batal']);
            $table->text('KetVerifikasi')->nullable();
            $table->date('deadline')->nullable();
            $table->Integer('WaktuTotal')->nullable();
            $table->timestamps();
        });

        Schema::table('pesanandesigns', function (Blueprint $table) {
            $table->foreign('IdPaket')->references('IdPaket')->on('paketdesigns')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('IdPaketRumah')->references('idPaketRumah')->on('datapaketdesigns')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('IdUSer')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanandesigns');
    }
}
