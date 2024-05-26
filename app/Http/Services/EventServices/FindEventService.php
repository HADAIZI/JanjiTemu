<?php

namespace App\Http\Services\EventServices;

use App\Http\Repositories\SqlEvent;
class FindEventService
{
    private SqlEvent $sqlEvent;
    public function __construct(SqlEvent $sqlEvent)
    {
        $this->sqlEvent = $sqlEvent;
    }
    public function execute(string $search)
    {
        $results = $this->sqlEvent->findEvent($search);
        return $results;
    }
}