<?php

namespace App\Http\Services\EventServices;
use App\Http\Repositories\SqlEvent;
class DeleteEventService
{

    private SqlEvent $sqlEvent;

    public function __construct(SqlEvent $sqlEvent)
    {
        $this->sqlEvent = $sqlEvent;
    }
    public function execute(string $id)
    {
        $this->sqlEvent->deleteEvent($id);
    }
}