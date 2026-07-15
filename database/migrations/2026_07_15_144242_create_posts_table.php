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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->foreignId('post_category_id')->constrained()->cascadeOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->string('image')->nullable();

            $table->text('excerpt')->nullable();

            $table->longText('body');

            $table->string('seo_title')->nullable();

            $table->text('seo_description')->nullable();

            $table->boolean('status')->default(true);

            $table->boolean('is_featured')->default(false);

            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
