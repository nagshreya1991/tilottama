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
        Schema::create('attendee_flags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendee_id')->constrained()->onDelete('cascade');
            $table->date('event_date');
            $table->boolean('entry')->default(false);
            $table->boolean('breakfast')->default(false);
            $table->boolean('lottery_11_12')->default(false);
            $table->boolean('lunch')->default(false);
            $table->boolean('lottery_5_6')->default(false);
            $table->boolean('poolside_entry')->default(false);
            $table->boolean('dinner')->default(false);
            $table->boolean('gift')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendee_flags');
    }
};
