<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/json/Group.json'));
        $groups = json_decode($json);

        foreach ($groups as $group) {
            DB::table("groups")->insert([
                "g_id" => $group->g_id,
                "g_name" => $group->g_name,
                "g_description" => $group->g_description,
                "g_users" => $group->g_users,
            ]);
        }
    }
}
