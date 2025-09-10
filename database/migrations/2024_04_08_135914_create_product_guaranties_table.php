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
        Schema::create('product_guaranties', function (Blueprint $table) {
            $table->id();
            $table->integer('main_price')->default(0);
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('count')->default(0);
            $table->integer('max_sell')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('guaranty_id');
            $table->foreign('guaranty_id')->references('id')->on('guaranties')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->boolean('is_spacial')->default(false);
            $table->timestamp('special_start')->nullable();
            $table->timestamp('special_expiration')->nullable();
            $table->enum('status' , ['waiting' , 'available' , 'unavailable' , 'stop_production' , 'rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_guaranties');
    }
};