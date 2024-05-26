<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTag extends Model
{
    use HasFactory;
    private string $Event_e_id;
    private string $Tag_t_id;
    public function __construct(string $Event_e_id, string $Tag_t_id)
    {
        $this->Event_e_id = $Event_e_id;
        $this->Tag_t_id = $Tag_t_id;
    }
    public function getEventTagEventId(): string
    {
        return $this->Event_e_id;
    }
    public function getEventTagTagId(): string
    {
        return $this->Tag_t_id;
    }
}
