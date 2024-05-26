<?php

namespace App\Http\Services\EventServices;

use App\Http\Repositories\SqlEvent;
class GetEventByUserIDService{
    private SqlEvent $sqlEvent;
    public function __construct(SqlEvent $sqlEvent){
        $this->sqlEvent = $sqlEvent;
    }
    public function execute(int $id){
        $results = $this->sqlEvent->getEventByUserID($id);
        return $results;
    }
}