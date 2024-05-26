<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path("seeders/json/User.json"));
        $users = json_decode($json);

        foreach ($users as $user) {
            DB::table("users")->insert([
                "email" => $user->email,
                "password" => $user->password,
                "roles_id" => $user->roles_id,
                "first_name" => $user->first_name,
                "last_name" => $user->last_name,
            ]);
        }
    }
}
