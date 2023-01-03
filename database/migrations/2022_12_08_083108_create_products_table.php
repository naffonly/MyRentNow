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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nameProduct');
            $table->longText('spekProduct');
            $table->string('imgProduct',100);
            $table->integer('priceProduct');
            $table->integer('stockProduct');
            $table->unsignedBigInteger('categoryId');
            $table->boolean('itsDelete');
            $table->timestamps();
            
            $table->foreign('categoryId')->references('id')->on('categoryProduct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
