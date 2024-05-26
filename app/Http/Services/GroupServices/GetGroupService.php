<?php

namespace App\Http\Services\GroupServices;

use App\Http\Repositories\SqlGroup;
use Carbon\carbon;
class GetGroupService{

    private SqlGroup $sqlGroup;
    public function __construct(SqlGroup $sqlGroup){
        $this->sqlGroup = $sqlGroup;
    }

    public function execute(int $count){
        $results = $this->sqlGroup->getGroup($count);
        return $results;
    }
}