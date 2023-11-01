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
    Schema::create('lessons', function (Blueprint $table) {
      $table->id();
      $table->foreignId('level_id')->constrained('levels')->onDelete('cascade');
      $table->string('uuid');
      $table->string('title')->unique();
      $table->string('excerpt');
      $table->string('banner');
      $table->longText('video_link');
      $table->longText('description');
      $table->boolean('status')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('lessons');
  }
};
