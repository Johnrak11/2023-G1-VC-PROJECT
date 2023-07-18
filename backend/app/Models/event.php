<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'location',
        'longitude',
        'latitude',
        'image',
        'venue',
        'organizer_id',
        'category_id',
        'isPublic'
    ];
    public function tickets(): HasMany
    {
        return $this->hasMany(Tickets::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function details()
    {
        return $this->hasMany(Event_detail::class);
    }
}
