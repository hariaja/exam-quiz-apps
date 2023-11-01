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
    Schema::create('questions', function (Blueprint $table) {
      $table->id();
      $table->string('uuid');
      $table->foreignId('lesson_id')->constrained('lessons')->onDelete('cascade');
      $table->string('title');
      $table->longText('question');
      $table->string('option_a'); // Deskripsi pilihan A
      $table->string('option_b'); // Deskripsi pilihan B
      $table->string('option_c'); // Deskripsi pilihan C
      $table->string('option_d'); // Deskripsi pilihan D
      $table->string('option_e'); // Deskripsi pilihan E
      $table->string('correct_option'); // Jawaban benar (A, B, C, D)
      $table->integer('degree')->default(10); // Point yang didapat setiap jawaban benar
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('questions');
  }
};
