<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
}
