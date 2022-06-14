<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_event_category',
        'title',
        'locality',
        'image',
        'participants',
        'description',
        'capacity',
        'date',
    ];

    protected $primaryKey = 'id_event';

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }

    public function event_category()
    {
        return $this->belongsTo(
            EventCategory::class,
            'id_event_category',
            'id_event_category'
        );
    }

    public function event_address()
    {
        return $this->belongsTo(
            EventAddress::class,
            'id_event_address',
            'id_event_address'
        );
    }
}
