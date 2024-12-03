<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = ['name', 'club_name', 'qr_code'];

    public function flags()
    {
        return $this->hasMany(AttendeeFlag::class);
    }
}
