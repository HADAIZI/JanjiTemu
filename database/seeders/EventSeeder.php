<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/json/Event.json'));
        $events = json_decode($json);
        foreach ($events as $event) {
            DB::table("events")->insert([
                "e_id" => $event->e_id,
                "e_name" => $event->e_name,
                "e_description" => $event->e_description,
                "e_date" => $event->e_date,
                "e_place" => $event->e_place,
                "e_image" => $event->e_image,
                "Group_g_uuid" => $event->Group_g_uuid,
                "e_event_host" => $event->e_event_host,
            ]);
        }
    }
}
