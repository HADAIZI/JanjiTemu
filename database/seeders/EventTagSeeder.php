<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path("seeders/json/EventTag.json"));
        $eventTags = json_decode($json);
        foreach ($eventTags as $eventTag) {
            DB::table("event_tags")->insert([
                "Event_e_id" => $eventTag->Event_e_id,
                "Tag_t_id" => $eventTag->Tag_t_id,
            ]);
        }
    }
}
