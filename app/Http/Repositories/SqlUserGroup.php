<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\UserGroup;

class SqlUserGroup{

    public function getUserGroup(int $count){
        $results = DB::table('user_group')->limit($count)->get();
        return $results;
    }

    public function persist(UserGroup $userGroup){
        DB::table('user_groups')->upsert([
            'ug_id' => $userGroup->getUserGroupId(),
            'User_u_id' => $userGroup->getUserGroupUserId(),
            'Group_g_id' => $userGroup->getUserGroupGroupId(),
            'Group_Role_gr_id' => $userGroup->getUserGroupGroupRoleId(),
        ], 'ug_id');
    }

    public function getUserInGroupByRoleId(int $roleId, string $groupId){
        $results = DB::table('user_groups')
        ->select('u.first_name', 'u.last_name')
        ->join('users as u', 'u.id', '=', 'user_groups.User_u_id')
        ->where('Group_Role_gr_id', $roleId)
        ->where('Group_g_id', $groupId)
        ->get();
        return $results;
    }

    public function getUserGroupId(int $userID){
        $results = DB::table('user_groups')
        ->select('ug_id')
        ->where('User_u_id', $userID)
        ->get();
        return $results;
    }

    public function getPermissionByUserId(int $userID, string $groupID){
        $results = DB::table('user_groups')
        ->select('ug_id','Group_Role_gr_id as role')
        ->where('User_u_id', $userID)
        ->where('Group_g_id', $groupID)
        ->first();
        return $results;
    }


    public function checkUserInGroup(int $userID, string $groupID){
        $results = DB::table('user_groups')
        ->select('ug_id')
        ->where('User_u_id', $userID)
        ->where('Group_g_id', $groupID)
        ->get();
        return $results;
    }
    public function getMemberInGroup(string $groupId){
        $results = DB::table('user_groups')
        ->select('u.id', 'u.first_name', 'u.last_name', 'gr.gr_position as role')
        ->join('users as u', 'u.id', '=', 'user_groups.User_u_id')
        ->join('group_roles as gr', 'gr.gr_id', '=', 'user_groups.Group_Role_gr_id')
        ->where('Group_g_id', $groupId)
        ->get();
        return $results;
    }

    public function setPrivilege(string $groupId, int $userId, int $roleId){
        $results = DB::table('user_groups')
        ->where('Group_g_id', $groupId)
        ->where('User_u_id', $userId)
        ->update(['Group_Role_gr_id' => $roleId]);
        return $results;
    }
}