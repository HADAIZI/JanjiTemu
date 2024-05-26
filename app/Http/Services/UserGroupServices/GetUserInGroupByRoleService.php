<?php
namespace App\Http\Services\UserGroupServices;

use App\Http\Repositories\SqlUserGroup;

class GetUserInGroupByRoleService{
    private SqlUserGroup $sqlUserGroup;

    public function __construct(SqlUserGroup $sqlUserGroup){
        $this->sqlUserGroup = $sqlUserGroup;
    }

    public function execute(int $roleId, string $groupId){
        $results = $this->sqlUserGroup->getUserInGroupByRoleId($roleId, $groupId);
        return $results;
    }
}