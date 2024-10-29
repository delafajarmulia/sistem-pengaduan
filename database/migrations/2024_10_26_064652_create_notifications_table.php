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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_home_id')->nullable();
            $table->unsignedBigInteger('user_away_id')->nullable();
            $table->unsignedBigInteger('complaint_id')->nullable(); // emg dari awal udah nullable
            $table->enum('category', ['add_response', 'change_status', 'change_nik'])->default('add_response');
            $table->longText('message')->nullable();
            $table->dateTime('date_of_notification')->nullable();
            $table->timestamps();

            $table->foreign('user_home_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_away_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
