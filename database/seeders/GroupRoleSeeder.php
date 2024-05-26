<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("group_roles")->insert([
            ["gr_id" => 1, "gr_position" => "master"],
            ["gr_id" => 2, "gr_position" => "moderator"],
            ["gr_id" => 3, "gr_position" => "member"],
        ]);
    }
}
