<?php

namespace App\Http\Services\EventServices;
use App\Models\Event;
use App\Http\Repositories\SqlEvent;

class CreateEventService{
    private SqlEvent $sqlEvent;
    public function __construct(SqlEvent $sqlEvent){
        $this->sqlEvent = $sqlEvent;
    }
    public function execute(Event $event){
        $this->sqlEvent->persist($event);
    }
}