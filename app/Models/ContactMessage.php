<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_date',
        'event_type',
        'message',
        'guest_count',
        'terms',
    ];

    protected $casts = [
        'event_date' => 'date',
        'terms' => 'boolean',
    ];
}
