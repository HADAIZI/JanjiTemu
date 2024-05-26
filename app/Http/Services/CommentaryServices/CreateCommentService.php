<?php

namespace App\Http\Services\CommentaryServices;
use App\Models\Commentary;
use App\Http\Repositories\SqlCommentary;
use Illuminate\Support\Str;
class CreateCommentService{

    private SqlCommentary $sqlCommentary;

    public function __construct(SqlCommentary $sqlCommentary){
        $this->sqlCommentary = $sqlCommentary;
    }

    public function execute(string $event_id, int $user_id, string $commentary){
        $comment = new Commentary(
            Str::uuid(),
            $commentary,
            $user_id,
            $event_id,
            date("Y-m-d H:i:s"),
        );
        $this->sqlCommentary->persist($comment);
    }
    
}