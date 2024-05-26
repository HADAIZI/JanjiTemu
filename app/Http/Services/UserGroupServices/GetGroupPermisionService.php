<?php

namespace App\Http\Services\UserGroupServices;
use App\Http\Repositories\SqlUserGroup;

class GetGroupPermisionService{
    private SqlUserGroup $sqlUserGroup;

    public function __construct(SqlUserGroup $sqlUserGroup){
        $this->sqlUserGroup = $sqlUserGroup;
    }

    public function execute(int $roleId, string $groupId){
        return $this->sqlUserGroup->getPermissionByUserId($roleId, $groupId);
    }
}