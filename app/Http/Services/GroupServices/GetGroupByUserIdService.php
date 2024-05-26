<?php

namespace App\Http\Services\GroupServices;
use App\Http\Repositories\SqlGroup;
class GetGroupByUserIdService{
    
        private SqlGroup $sqlGroup;
        public function __construct(SqlGroup $sqlGroup){
            $this->sqlGroup = $sqlGroup;
        }
    
        public function execute(int $userID){
            return $this->sqlGroup->getGroupByUserId($userID);
        }
}