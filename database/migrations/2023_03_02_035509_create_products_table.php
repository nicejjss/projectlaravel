<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->timestamps();
            $table->integer('category_id');
            $table->string('name');
            $table->longText('description');
            $table->longText('content');
            $table->string('img');
            $table->bigInteger('price');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
