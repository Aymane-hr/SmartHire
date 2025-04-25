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

        Schema::create('messages', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('sender_id')->nullable();
            $table->foreign('sender_id')->references('id')->on('users');
            $table->integer('receiver_id')->nullable();
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->text('content')->nullable();
            $table->timestamp('sent_at')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
