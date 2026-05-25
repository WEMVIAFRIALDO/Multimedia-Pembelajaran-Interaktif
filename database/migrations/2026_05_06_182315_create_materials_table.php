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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('kelas'); // 11, 12
            $table->string('jurusan'); // RPL, Multimedia, etc
            $table->string('mata_pelajaran'); // Hardware, Grafika Komputer, etc
            $table->string('title'); // Transformasi 2D, etc
            $table->string('slug')->unique();
            $table->longText('content_fokus'); // Detailed content for fokus mood
            $table->longText('content_biasa'); // Standard content for biasa mood
            $table->longText('content_lelah'); // Summary content for lelah mood
            $table->text('ringkasan')->nullable(); // Quick summary
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
