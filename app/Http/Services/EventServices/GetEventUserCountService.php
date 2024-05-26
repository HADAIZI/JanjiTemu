<?php

namespace App\Http\Services\EventServices;
use App\Http\Repositories\SqlEventUser;
class GetEventUserCountService{

    private SqlEventUser $sqlEventUser;
    public function __construct(SqlEventUser $sqlEventUser){
        $this->sqlEventUser = $sqlEventUser;
    }

    public function execute(string $eventID){
        $results = $this->sqlEventUser->getEventMemberCount($eventID);
        return $results;
    }
}