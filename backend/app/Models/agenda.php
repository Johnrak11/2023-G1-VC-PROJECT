<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'title',
        'description',
        'event_id'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
