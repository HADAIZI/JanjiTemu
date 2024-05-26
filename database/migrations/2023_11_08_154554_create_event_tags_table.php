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
        Schema::create('event_tags', function (Blueprint $table) {
            $table->uuid('Event_e_id')->index();
            $table->uuid('Tag_t_id')->index();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('Event_e_id')->references('e_id')->on('events');
            $table->foreign('Tag_t_id')->references('t_id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_tags');
    }
};
