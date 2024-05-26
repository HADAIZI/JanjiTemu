<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{
    use HasFactory;

    private int $gr_id;
    private string $gr_position;

    public function __construct(int $gr_id, string $gr_position)
    {
        $this->gr_id = $gr_id;
        $this->gr_position = $gr_position;
    }

    public function getGroupRoleId(): int
    {
        return $this->gr_id;
    }

    public function getGroupRolePosition(): string
    {
        return $this->gr_position;
    }
}
