<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'available_ticket',
        'restriction',
        'description',
        'price',
        'event_id',
    ];
}
