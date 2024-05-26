<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    private string $ug_id;
    private int $User_u_id;
    private string $Group_g_id;
    private int $GroupRole_gr_id;

    public function __construct(string $ug_id, int $User_u_id, string $Group_g_id, int $GroupRole_gr_id)
    {
        $this->ug_id = $ug_id;
        $this->User_u_id = $User_u_id;
        $this->Group_g_id = $Group_g_id;
        $this->GroupRole_gr_id = $GroupRole_gr_id;
    }

    public function getUserGroupId(): string
    {
        return $this->ug_id;
    }

    public function getUserGroupUserId(): int
    {
        return $this->User_u_id;
    }

    public function getUserGroupGroupId(): string
    {
        return $this->Group_g_id;
    }

    public function getUserGroupGroupRoleId(): int
    {
        return $this->GroupRole_gr_id;
    }
}
