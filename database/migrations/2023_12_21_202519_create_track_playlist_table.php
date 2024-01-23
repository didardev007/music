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
        Schema::create('track_playlists', function (Blueprint $table) {
            $table->foreignId('track_id')->references('id')->on('tracks')->cascadeOnDelete();
            $table->foreignId('playlist_id')->references('id')->on('playlists')->cascadeOnDelete();
            $table->primary(['track_id', 'playlist_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track_playlists');
    }
};
