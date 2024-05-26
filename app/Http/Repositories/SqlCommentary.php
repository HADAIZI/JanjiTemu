<?php

namespace App\Http\Repositories;
use Illuminate\Support\Facades\DB;
use App\Models\Commentary;
class SqlCommentary{
    public function persist(Commentary $c){
        DB::table('commentary')->upsert([
            'c_id' => $c->getCommentaryId(),
            'c_comment' => $c->getCommentaryComment(),
            'User_u_id' => $c->getCommentaryUserId(),
            'Event_e_id' => $c->getCommentaryEventId(),
        ],'c_id');
    }

    public function getCommentById(string $event_id){
        $results = DB::table('commentary')
        ->select('c_id','c_comment','User_u_id','Event_e_id','created_at')
        ->where('Event_e_id', $event_id)
        ->get();
        return $results;
    }
}