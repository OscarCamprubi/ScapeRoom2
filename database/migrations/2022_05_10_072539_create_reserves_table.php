<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEmpleat');
            $table->foreign('idEmpleat')->references('id')->on('users');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->unsignedBigInteger('idSala');
            $table->foreign('idSala')->references('id')->on('sales');
            $table->unsignedBigInteger('idVoucher');
            $table->foreign('idVoucher')->references('id')->on('vouchers');
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
        Schema::dropIfExists('reserves');
    }
}
