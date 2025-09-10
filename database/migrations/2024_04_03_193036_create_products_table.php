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
            $table->id();
            $table->string('title')->index();
            $table->string('etitle');
            $table->string('slug');
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('count')->default(0);
            $table->integer('max_sell')->nullable();
            $table->integer('viewed')->default(0);
            $table->integer('sold')->default(0);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('guaranty_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('special_start')->nullable();
            $table->timestamp('special_expiration')->nullable();
            $table->enum('status' , ['waiting' , 'available' , 'unavailable' , 'stop_production' , 'rejected']);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('color')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();

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