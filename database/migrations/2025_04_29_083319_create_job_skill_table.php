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
        Schema::disableForeignKeyConstraints();

        Schema::create('job_skill', function (Blueprint $table) {
            $table->integer('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->integer('skill_id')->nullable();
            $table->foreign('skill_id')->references('id')->on('skills');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_skill');
    }
};
