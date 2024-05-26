<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    private string $g_id;
    private string $g_name;
    private string $g_description;
    private int $g_users;
    private string $created_at;

    public function __construct(string $g_id, string $g_name, string $g_description, int $g_users, string $created_at)
    {
        $this->g_id = $g_id;
        $this->g_name = $g_name;
        $this->g_description = $g_description;
        $this->g_users = $g_users;
        $this->created_at = $created_at;
    }

    public function getGroupId(): string
    {
        return $this->g_id;
    }

    public function getGroupName(): string
    {
        return $this->g_name;
    }

    public function getGroupDescription(): string
    {
        return $this->g_description;
    }

    public function getGroupUsers(): string
    {
        return $this->g_users;
    }

    public function getGroupCreatedAt(): string
    {
        return $this->created_at;
    }
}
