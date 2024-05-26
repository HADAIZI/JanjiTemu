<?php

namespace App\Http\Services\GroupServices;

use App\Http\Repositories\SqlGroup;

class SearchGroupService{

    private SqlGroup $sqlGroup;
    public function __construct(SqlGroup $sqlGroup){
        $this->sqlGroup = $sqlGroup;
    }

    public function execute(string $group){
        return $this->sqlGroup->searchGroup($group);
    }
}
