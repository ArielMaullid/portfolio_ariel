<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_desc', 500);
            $table->text('description')->nullable();
            $table->text('background')->nullable();
            $table->text('objective')->nullable();
            $table->json('features')->nullable();
            $table->text('contribution')->nullable();
            $table->text('development')->nullable();
            $table->text('result')->nullable();
            $table->string('image')->nullable();
            $table->string('category');
            $table->json('technologies');
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->unsignedSmallInteger('year')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index(['featured', 'order']);
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};