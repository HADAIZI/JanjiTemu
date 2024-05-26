<?php

namespace App\Http\Services\EventServices;

use App\Http\Repositories\SqlEvent;

class GetSomeEventService{
    private SqlEvent $sqlEvent;
    public function __construct(SqlEvent $sqlEvent){
        $this->sqlEvent = $sqlEvent;
    }
    public function execute($count){
        $results = $this->sqlEvent->getSomeEventLists($count);
        foreach($results as $result){
            $splitted = explode(" ", $result->e_date);
            $result->e_date = date('l, d F Y', strtotime($splitted[0]));
            $result->e_time = date('h:i A', strtotime($splitted[1]));
        }
        return $results;
    }
}