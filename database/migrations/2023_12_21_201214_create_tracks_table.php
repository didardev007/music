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
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_id')->index();
            $table->foreign('artist_id')->references('id')->on('artists')->cascadeOnDelete();
            $table->unsignedBigInteger('album_id')->index()->nullable();
            $table->foreign('album_id')->references('id')->on('albums')->cascadeOnDelete();
            $table->unsignedBigInteger('genre_id')->index();
            $table->foreign('genre_id')->references('id')->on('genres')->cascadeOnDelete();
            $table->boolean('is_favorite')->default(false);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('durability')->nullable();
            $table->unsignedBigInteger('viewed')->default(0);
            $table->string('release_date')->nullable();
            $table->string('mp3_path');
            $table->string('file_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
