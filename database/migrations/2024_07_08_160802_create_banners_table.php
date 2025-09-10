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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->enum('status' , ['active' , 'inactive' , 'banned']);
            $table->enum('type' , ['top_banner' , 'side_banner' , 'large_banner' , 'medium_banner' , 'small_banner']);
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('banners');
    }
};