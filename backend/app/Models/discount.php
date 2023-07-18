<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'end_date',
        'percent',
        'event_detail_id',
    ];

    public function eventDetail()
    {
        return $this->belongsTo(Event_detail::class);
    }
}
