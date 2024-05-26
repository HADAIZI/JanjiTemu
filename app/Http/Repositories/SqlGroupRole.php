<?php

namespace App\Http\Repositories;
use Illuminate\Support\Facades\DB;
class SqlGroupRole{
    public function getRoleNameByID(int $id){
        $roleName = DB::table('group_roles')
        ->select('gr_position as role')
        ->where('gr_id', $id)->first();
        return $roleName;
    }
}