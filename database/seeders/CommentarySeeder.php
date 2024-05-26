<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path("seeders/json/Commentary.json"));
        $commentaries = json_decode($json);
        foreach ($commentaries as $commentary) {
            DB::table("commentary")->insert([
                "c_id" => $commentary->c_id,
                "c_comment" => $commentary->c_comment,
                "User_u_id" => $commentary->User_u_id,
                "Event_e_id" => $commentary->Event_e_id,
            ]);
        }
    }
}
