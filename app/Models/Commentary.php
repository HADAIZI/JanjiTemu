<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;

    private string $c_id;
    private string $c_comment;
    private int $User_u_id;
    private string $Event_e_id;
    private string $created_at;
    public function __construct(string $c_id, string $c_comment, int $User_u_id, string $Event_e_id, string $created_at)
    {
        $this->c_id = $c_id;
        $this->c_comment = $c_comment;
        $this->User_u_id = $User_u_id;
        $this->Event_e_id = $Event_e_id;
        $this->created_at = $created_at;
    }

    public function getCommentaryId(): string
    {
        return $this->c_id;
    }

    public function getCommentaryComment(): string
    {
        return $this->c_comment;
    }

    public function getCommentaryUserId(): int
    {
        return $this->User_u_id;
    }

    public function getCommentaryEventId(): string
    {
        return $this->Event_e_id;
    }

    public function getCommentaryCreatedAt(): string
    {
        return $this->created_at;
    }
}
