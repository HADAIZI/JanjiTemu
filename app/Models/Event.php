<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    private string $e_id;
    private string $e_name;
    private string $e_description;
    private string $e_place;
    private string $e_image;
    private string $e_date;
    private string $Group_g_uuid;
    private string $e_event_host;
    
    public function __construct(string $e_id, string $e_name, string $e_description, string $e_place, string $e_image, string $e_date, string $Group_g_uuid, string $e_event_host)
    {
        $this->e_id = $e_id;
        $this->e_name = $e_name;
        $this->e_description = $e_description;
        $this->e_place = $e_place;
        $this->e_image = $e_image;
        $this->e_date = $e_date;
        $this->Group_g_uuid = $Group_g_uuid;
        $this->e_event_host = $e_event_host;
    }

    public function getEventId(): string
    {
        return $this->e_id;
    }

    public function getEventName(): string
    {
        return $this->e_name;
    }

    public function getEventDescription(): string
    {
        return $this->e_description;
    }

    public function getEventPlace(): string
    {
        return $this->e_place;
    }

    public function getEventImage(): string
    {
        return $this->e_image;
    }

    public function getEventDate(): string
    {
        return $this->e_date;
    }

    public function getEventGroup(): string
    {
        return $this->Group_g_uuid;
    }

    public function getEventHost(): string
    {
        return $this->e_event_host;
    }
}
