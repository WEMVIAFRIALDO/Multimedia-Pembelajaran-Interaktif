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
        Schema::create('progresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('materi_id')->nullable()->constrained('materis')->onDelete('cascade');
            $table->foreignId('kuis_id')->nullable()->constrained('kuis')->onDelete('cascade');
            $table->enum('status', ['in_progress', 'completed']);
            $table->integer('score')->nullable(); // for quizzes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresses');
    }
};