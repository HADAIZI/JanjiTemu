<?php

namespace App\Http\Services\CommentaryServices;

use App\Models\Commentary;
use App\Http\Repositories\SqlCommentary;
class GetCommentaryService{

    private SqlCommentary $sqlCommentary;
    public function __construct(SqlCommentary $sqlCommentary){
        $this->sqlCommentary = $sqlCommentary;
    }
    public function execute(string $event_id){
        $comments = $this->sqlCommentary->getCommentById($event_id);
        return $comments;
    }
}