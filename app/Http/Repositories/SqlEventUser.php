<?php

namespace App\Http\Repositories;
use App\Models\UserEvent;
use Illuminate\Support\Facades\DB;
class SqlEventUser{
    public function checkUser(int $id, string $eventID){
        $results = DB::table('user_events')->where('User_u_id', $id)->where('Event_e_id', $eventID)->get();
        if(count($results) > 0){
            return true;
        }
        return false;
    }

    public function persist(UserEvent $userEvent)
    {
        DB::table('user_events')->insert([
            'ue_id' => $userEvent->getUserEventId(),
            'User_u_id' => $userEvent->getUserEventUserId(),
            'Event_e_id' => $userEvent->getUserEventEventId(),
        ]);
    }

    public function leaveEvent(int $id, string $eventID){
        DB::table('user_events')->where('User_u_id', $id)->where('Event_e_id', $eventID)->delete();
    }

    public function getEventParticipant(string $eventID){
        $results = DB::table('user_events')
        ->select('u.first_name', 'u.last_name')
        ->join('users as u', 'u.id', '=', 'user_events.User_u_id')
        ->where('Event_e_id', $eventID)
        ->get();
        return $results;
    }

    public function getEventParticipantCount(string $eventID){
        $results = DB::table('user_events')
        ->select('ue_id')
        ->where('Event_e_id', $eventID)
        ->count();
        return $results;
    }
    public function getEventMemberCount(string $eventId){
        $results = DB::table('user_events')
        ->select(DB::raw('count(*) as total'))
        ->where('Event_e_id', $eventId)
        ->first();
        return $results;
    }
}