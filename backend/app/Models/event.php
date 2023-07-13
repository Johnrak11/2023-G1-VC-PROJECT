<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'location',
        'image',
        'venue',
        'price',
        'organizer_id',
        'category_id'
    ];
    public function tickets(): HasMany
    {
        return $this->hasMany(Tickets::class);
    }
}
