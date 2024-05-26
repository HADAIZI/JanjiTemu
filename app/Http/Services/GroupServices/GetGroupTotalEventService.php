<?php

namespace App\Http\Services\GroupServices;

use App\Http\Repositories\SqlGroup;
class GetGroupTotalEventService{
    private SqlGroup $sqlGroup;

    public function __construct(SqlGroup $sqlGroup)
    {
        $this->sqlGroup = $sqlGroup;
    }

    public function execute(string $id)
    {
        $results = $this->sqlGroup->getGroupTotalEvent($id);
        return $results;
    }
}