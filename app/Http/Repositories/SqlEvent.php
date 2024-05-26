<?php

namespace App\Http\Repositories;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
class SqlEvent{
    public function getSomeEventLists($count){
        $results = DB::table('events')->select('e_id', 'g_id', 'e_name','e_place', 'e_date', 'e_image', 'g_name', 'e_date')
        ->join('groups', 'events.Group_g_uuid', '=', 'groups.g_id')->limit($count)->latest('events.created_at')->get();
        return $results;
    }

    public function persist(Event $event){
        DB::table('events')->upsert([
            'e_id' => $event->getEventId(),
            'e_name' => $event->getEventName(),
            'e_description' => $event->getEventDescription(),
            'e_place' => $event->getEventPlace(),
            'e_image' => $event->getEventImage(),
            'e_date' => $event->getEventDate(),
            'Group_g_uuid' => $event->getEventGroup(),
            'e_event_host' => $event->getEventHost(),
        ],'e_id');
    }
    
    public function deleteEvent(string $id){
        DB::table('events')->where('e_id', '=', $id)->delete();
    }

    public function findEvent(string $search){
        $results = DB::table('events')->select('g_id','e_id', 'e_name','e_place', 'e_date', 'e_image', 'g_name', 'e_date')
        ->join('groups', 'events.Group_g_uuid', '=', 'groups.g_id')->where('e_name', 'ilike', '%'.$search.'%')->get();
        return $results;
    }

    public function getEventByUserID(int $userID){
        $results = DB::table('events')
        ->select('g_id','e_id','e_name','e_place', 'e_date', 'e_image', 'g_name', 'e_date')
        ->join('groups', 'events.Group_g_uuid', '=', 'groups.g_id')
        ->join('user_groups', 'groups.g_id', '=', 'user_groups.Group_g_id')
        ->where('User_u_id', $userID)
        ->get();
        return $results;
    }

    public function getEventInGroup(string $groupId){
        $results = DB::table('events')
        ->select('e_name','e_place', 'e_date', 'e_image', 'g_name', 'e_date')
        ->join('groups', 'events.Group_g_uuid', '=', 'groups.g_id')
        ->where('Group_g_uuid', $groupId)
        ->get();
        return $results;
    }

    public function getEventById(string $eventId){
        $results = DB::table('events')
        ->select('e_id','g_users','g_id','e_name','e_place', 'e_date', 'e_image','e_description', 'g_name', 'e_date')
        ->join('groups', 'events.Group_g_uuid', '=', 'groups.g_id')
        ->where('e_id', $eventId)
        ->first();
        return $results;
    }
}