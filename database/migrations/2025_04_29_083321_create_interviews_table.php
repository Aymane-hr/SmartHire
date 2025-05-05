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

        Schema::create('interviews', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('application_id')->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->dateTime('interview_date')->nullable();
            $table->string('zoom_link')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
