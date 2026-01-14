<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['berita', 'pengumuman'])->default('berita');
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->string('slug')->unique(); // Manual input validasi unik
            $table->text('content'); // Rich Text
            $table->integer('view_count')->default(0);
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });

        Schema::create('post_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('ip_address');
            $table->timestamp('viewed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('post_views');
        Schema::dropIfExists('posts');
    }
};
