<?php

namespace App\Http\Services\UserServices;
use App\Http\Repositories\SqlUser;
class GetUserNameByIdService
{
    private SqlUser $sqlUser;

    public function __construct(SqlUser $sqlUser)
    {
        $this->sqlUser = $sqlUser;
    }

    public function execute(int $id)
    {
        $results = $this->sqlUser->getUserNameById($id);
        return $results;
    }
}