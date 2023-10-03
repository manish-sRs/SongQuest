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
        Schema::table('recommendations', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->after('description'); // it adds a column after 'description' column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']); // it will first delete the foreign key constraint
            $table->dropColumn('user_id'); // then the column will get deleted
        });
    }
};
