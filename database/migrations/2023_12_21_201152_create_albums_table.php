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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_id')->index();
            $table->foreign('artist_id')->references('id')->on('artists')->cascadeOnDelete();
            $table->string('name');
            $table->string('name_ru')->nullable();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->dateTime('release_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
