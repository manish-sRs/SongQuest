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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('recommendation_name');
            $table->unsignedBigInteger('recommendation_for');
            $table->unsignedBigInteger('recommendation_1');
            $table->unsignedBigInteger('recommendation_2');
            $table->unsignedBigInteger('recommendation_3');
            $table->text('description')->nullable();
            

            $table->foreign('recommendation_for')->references('id')->on('songs')->onDelete('cascade');
            $table->foreign('recommendation_1')->references('id')->on('songs')->onDelete('cascade');
            $table->foreign('recommendation_2')->references('id')->on('songs')->onDelete('cascade');
            $table->foreign('recommendation_3')->references('id')->on('songs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
