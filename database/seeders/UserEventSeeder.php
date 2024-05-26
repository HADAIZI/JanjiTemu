<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path("seeders/json/UserEvent.json"));
        $userEvents = json_decode($json);
        foreach ($userEvents as $event) {
            DB::table("user_events")->insert([
                "ue_id" => $event->ue_id,
                "User_u_id" => $event->User_u_id,
                "Event_e_id" => $event->Event_e_id,
            ]);
        }    
    }
}
