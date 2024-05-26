<?php

namespace App\Http\Services\EventServices;
use App\Http\Repositories\SqlEvent;
class GetEventInGroupService{

    private SqlEvent $sqlEvent;

    public function __construct(SqlEvent $sqlEvent){
        $this->sqlEvent = $sqlEvent;
    }  

    public function execute(string $id){
        $results = $this->sqlEvent->getEventInGroup($id);
        return $results;
    }

}