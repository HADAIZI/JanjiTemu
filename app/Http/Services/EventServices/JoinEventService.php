<?php

namespace App\Http\Services\EventServices;
use App\Http\Repositories\SqlEventUser;
use App\Models\UserEvent;
use Illuminate\Support\Str;

class JoinEventService{
    private SqlEventUser $sqlEventUser;

    public function __construct(SqlEventUser $sqlEventUser){
        $this->sqlEventUser = $sqlEventUser;
    }

    public function execute(int $id, string $eventID){
        $result = $this->sqlEventUser->checkUser($id, $eventID);
        if($result){
            return "Kamu telah bergabung dalam event ini";
        }
        $eventUser = new UserEvent(Str::uuid(),$id, $eventID, date("Y-m-d H:i:s"));
        $this->sqlEventUser->persist($eventUser);
        return "Berhasil bergabung dalam event";
    }
}