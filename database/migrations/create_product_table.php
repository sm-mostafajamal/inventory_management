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
            $table->id()->autoIncrement();
            $table->string('sr_name', length:100);
            $table->string('sr_company', length:100);
            $table->string('sr_phone', length:20);
            $table->string('product_name', length:100);
            $table->double('price');
            $table->integer('quantity');
            $table->double('total');
            $table->string('category', length:100);
            $table->string('image', length:250);
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
        Schema::dropIfExists('users');
    }
};
