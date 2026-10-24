<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Case study fields
            $table->string('role')->nullable();
            $table->string('duration')->nullable();
            $table->text('challenges')->nullable();
            $table->text('reflection')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['role', 'duration', 'challenges', 'reflection']);
        });
    }
};