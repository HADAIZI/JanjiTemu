<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    private string $t_id;
    private string $t_name;
    
    public function __construct(string $t_id, string $t_name)
    {
        $this->t_id = $t_id;
        $this->t_name = $t_name;
    }
    public function getTagId(): string
    {
        return $this->t_id;
    }
    public function getTagName(): string
    {
        return $this->t_name;
    }
    
}
