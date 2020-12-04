<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('IdPay');
            $table->bigInteger('IdPesanan')->unsigned();
            $table->string('TanggalPesan')->unique()->nullable();
            $table->string('Status')->nullable();
            $table->decimal('Amount', 16,2)->default(0);
            $table->string('Method')->nullable();
            $table->string('Token')->nullable();
            $table->json('Payloads')->nullable();
            $table->string('PaymentType')->nullable();
            $table->string('VaNumber')->nullable();
            $table->string('VendorName')->nullable();
            $table->string('StatusCode')->nullable();
            $table->string('BillKey')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('payments');
    }
}
