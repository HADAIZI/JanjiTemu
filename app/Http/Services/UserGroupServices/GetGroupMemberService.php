<?php

namespace App\Http\Services\UserGroupServices;

use App\Http\Repositories\SqlUserGroup;

class GetGroupMemberService{

    private SqlUserGroup $sqlUserGroup;
    public function __construct(SqlUserGroup $sqlUserGroup){
        $this->sqlUserGroup = $sqlUserGroup;
    }

    public function execute(string $id){
        $results = $this->sqlUserGroup->getMemberInGroup($id);
        return $results;
    }
}