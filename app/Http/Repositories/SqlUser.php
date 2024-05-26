<?php
namespace App\Http\Repositories;
use Illuminate\Support\Facades\DB;

class SqlUser{
    public function getUsernameByID(int $id){
        $userName = DB::table('users')
        ->select('first_name','last_name')
        ->where('id', $id)->first();
        return $userName;
    }

    public function getEmailByID(int $id){
        $email = DB::table('users')
        ->select('email')
        ->where('id', $id)->first();
        return $email;
    }
}