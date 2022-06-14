<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAddress extends Model
{
    use HasFactory;

    protected $table = 'event_address';

    protected $primaryKey = 'id_event_address';

    protected $fillable = [
        'event_cep',
        'event_city',
        'event_state',
        'event_address',
        'event_address_district',
        'event_address_number',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'id_event_address', 'id_event_address');
    }


}
