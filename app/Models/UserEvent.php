<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    use HasFactory;

    private string $ue_id;
    private int $User_u_id;
    private string $Event_e_id;
    private string $created_at;

    public function __construct(string $ue_id, int $User_u_id, string $Event_e_id, string $created_at)
    {
        $this->ue_id = $ue_id;
        $this->User_u_id = $User_u_id;
        $this->Event_e_id = $Event_e_id;
        $this->created_at = $created_at;
    }

    public function getUserEventId(): string
    {
        return $this->ue_id;
    }

    public function getUserEventUserId(): int
    {
        return $this->User_u_id;
    }

    public function getUserEventEventId(): string
    {
        return $this->Event_e_id;
    }

    public function getUserEventCreatedAt(): string
    {
        return $this->created_at;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
