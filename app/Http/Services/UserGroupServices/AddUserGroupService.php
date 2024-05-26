<?php

namespace App\Http\Services\UserGroupServices;
use App\Http\Repositories\SqlUserGroup;
use App\Models\UserGroup;
class AddUserGroupService{

    private SqlUserGroup $sqlUserGroup;
    public function __construct(SqlUserGroup $sqlUserGroup){
        $this->sqlUserGroup = $sqlUserGroup;
    }

    public function execute(UserGroup $userGroup){
        $userCheck = $this->sqlUserGroup->checkUserInGroup($userGroup->getUserGroupUserId(), $userGroup->getUserGroupGroupId());
        if(count($userCheck) > 0){
            return "User telah bergabung dengan grup";
        }
        $this->sqlUserGroup->persist($userGroup);
        return "User berhasil bergabung dengan grup";
    }
}