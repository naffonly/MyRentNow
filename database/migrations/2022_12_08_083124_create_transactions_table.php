<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPeminjam');
            $table->unsignedBigInteger('idProduct');
            $table->date('dateIn')->nullable();
            $table->date('dateOut')->nullable();
            $table->tinyInteger('status');
            $table->boolean('itsDelete');
            $table->timestamps();

            $table->foreign('idPeminjam')->references('id')->on('users');
            $table->foreign('idProduct')->references('id')->on('products');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
