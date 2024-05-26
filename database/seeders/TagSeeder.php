<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/json/Tag.json'));
        $tags = json_decode($json);
        foreach ($tags as $tag) {
            DB::table("tags")->insert([
                "t_id" => $tag->t_id,
                "t_name" => $tag->t_name,
            ]);
        }
    }
}
