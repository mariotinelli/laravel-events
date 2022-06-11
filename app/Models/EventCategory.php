<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $table = 'event_category';

    protected $primaryKey = 'id_event_category';

    public function events()
    {
        return $this->hasMany(Event::class, 'id_event_category', 'id_event_category');
    }
}
