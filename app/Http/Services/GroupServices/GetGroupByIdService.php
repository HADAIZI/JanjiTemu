<?php

namespace App\Http\Services\GroupServices;

use App\Http\Repositories\SqlGroup;

class GetGroupByIdService
{
    private SqlGroup $sqlGroup;

    public function __construct(SqlGroup $sqlGroup)
    {
        $this->sqlGroup = $sqlGroup;
    }

    public function execute(string $id)
    {
        $results = $this->sqlGroup->getGroupById($id);
        return $results;
    }
}