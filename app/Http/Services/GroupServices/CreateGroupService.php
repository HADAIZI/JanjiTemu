<?php

namespace App\Http\Services\GroupServices;

use App\Http\Repositories\SqlGroup;
use App\Models\Group;

class CreateGroupService{

    private SqlGroup $sqlGroup;
    public function __construct(SqlGroup $sqlGroup){
        $this->sqlGroup = $sqlGroup;
    }

    public function execute(Group $group){
        $this->sqlGroup->persist($group);
    }
}   