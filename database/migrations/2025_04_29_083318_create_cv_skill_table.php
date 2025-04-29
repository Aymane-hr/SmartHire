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

        Schema::create('cv_skill', function (Blueprint $table) {
            $table->integer('cv_id')->nullable();
            $table->foreign('cv_id')->references('id')->on('cvs');
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
        Schema::dropIfExists('cv_skill');
    }
};
