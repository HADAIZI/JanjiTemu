<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/json/UserGroup.json'));
        $userGroups = json_decode($json);
        foreach ($userGroups as $group) {
            DB::table("user_groups")->insert([
                "ug_id" => $group->ug_id,
                "User_u_id" => $group->User_u_id,
                "Group_g_id" => $group->Group_g_id,
                "Group_Role_gr_id" => 1,
            ]);
        }
    }
}
