<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('headline');
            $table->text('short_bio')->nullable();
            $table->text('about_me')->nullable();
            $table->string('photo')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('location')->nullable();
            $table->string('university')->nullable();
            $table->string('major')->nullable();
            $table->string('graduation_status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};