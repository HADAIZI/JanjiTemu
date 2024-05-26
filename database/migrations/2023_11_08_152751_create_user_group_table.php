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
        Schema::create('user_groups', function (Blueprint $table) {
            $table->uuid('ug_id')->primary();
            $table->integer('User_u_id')->index();
            $table->uuid('Group_g_id')->index();
            $table->integer('Group_Role_gr_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('User_u_id')->references('id')->on('users');
            $table->foreign('Group_g_id')->references('g_id')->on('groups');
            $table->foreign('Group_Role_gr_id')->references('gr_id')->on('group_roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_group');
    }
};
