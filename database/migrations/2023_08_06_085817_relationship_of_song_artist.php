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
        //
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('artist_name');
            $table->timestamps();
        });

        Schema::create('artist_song', function (Blueprint $table) {
            $table->foreignId('artist_id')->constrained();
            $table->foreignId('song_id')->constrained();
            $table->timestamps();
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_song');
        Schema::dropIfExists('songs');
        Schema::dropIfExists('artists');
    }
};
