<?php

namespace App\Http\Services\UserGroupServices;
use App\Http\Repositories\SqlUserGroup;
use App\Http\Repositories\SqlUser;
use App\Http\Repositories\SqlGroupRole;
use App\Mail\PrivilegeNotifMail;
use Illuminate\Support\Facades\Mail;

class SetPrivilegeService{

    private SqlUserGroup $sqlUserGroup;
    private SqlUser $sqlUser;
    private SqlGroupRole $sqlGroupRole;
    public function __construct(SqlUserGroup $sqlUserGroup, SqlUser $sqlUser, SqlGroupRole $sqlGroupRole){
        $this->sqlUserGroup = $sqlUserGroup;
        $this->sqlUser = $sqlUser;
        $this->sqlGroupRole = $sqlGroupRole;
    }
    public function execute(string $groupId, int $userId, int $roleId){
        $this->sqlUserGroup->setPrivilege($groupId, $userId, $roleId);
        $user = $this->sqlUser->getUsernameByID($userId);
        $user = $user->first_name . " " . $user->last_name;
        $email = $this->sqlUser->getEmailByID($userId);
        $master = $this->sqlUserGroup->getUserInGroupByRoleId(1, $groupId)[0];
        $master = $master->first_name . " " . $master->last_name;
        $privilege = $this->sqlGroupRole->getRoleNameByID($roleId);
        Mail::to($email->email)->send(new PrivilegeNotifMail($user, $privilege, $master));
    }
}