<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AttendeeFlag extends Model
{
    protected $fillable = [
        'attendee_id',
        'event_date',
        'entry',
        'breakfast',
        'lottery_11_12',
        'lunch',
        'lottery_5_6',
        'poolside_entry',
        'dinner',
        'gift',
    ];

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

}
