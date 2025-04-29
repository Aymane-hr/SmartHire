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

        Schema::create('matches', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('cv_id')->nullable();
            $table->foreign('cv_id')->references('id')->on('cvs');
            $table->integer('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->float('match_score')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
