<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'available_ticket',
        'description',
        'price',
        'event_id',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
