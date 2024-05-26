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
        Schema::create('user_events', function (Blueprint $table) {
            $table->uuid('ue_id')->primary();
            $table->integer('User_u_id')->index();
            $table->uuid('Event_e_id')->index();

            $table->foreign('User_u_id')->references('id')->on('users');
            $table->foreign('Event_e_id')->references('e_id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_events');
    }
};
