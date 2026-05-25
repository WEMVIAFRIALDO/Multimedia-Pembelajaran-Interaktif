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
        Schema::table('progresses', function (Blueprint $table) {
            $table->dropForeign(['materi_id']);
            $table->foreign('materi_id')->references('id')->on('materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progresses', function (Blueprint $table) {
            $table->dropForeign(['materi_id']);
            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
        });
    }
};
