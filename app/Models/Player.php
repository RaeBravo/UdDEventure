<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_registration_id',
        'student_id',
        'name',
        'email',
        'department',
        'age',
        'player_image',
        'whiteform_image',
    ];

    // Relationship: Each player belongs to one event registration
    public function eventRegistration()
    {
        return $this->belongsTo(EventRegistration::class);
    }

    // Accessor to get the event through the registration
    public function getEventAttribute()
    {
        return $this->eventRegistration?->event;
    }
}
