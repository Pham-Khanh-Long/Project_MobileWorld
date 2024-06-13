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
            $table->increments('id');
            $table->integer('manufacturer_id')->unsigned();
            $table->string('main_img');
            $table->string('title');
            $table->string('color');
            $table->string('memory');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('quantity');
            $table->longText('description_summary');
            $table->longText('description_detailed');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
