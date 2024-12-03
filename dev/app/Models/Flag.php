<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    protected $fillable = ['name'];

    /**
     * Relationship: Flag belongs to many attendees.
     */
    public function attendees()
    {
        return $this->belongsToMany(Attendee::class, 'attendee_flags')
            ->withPivot(['event_date', 'status'])
            ->withTimestamps();
    }
}
