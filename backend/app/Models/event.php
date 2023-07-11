<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
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
        'organizer_id',
        'category_id'
    ];

    public function categories(){
        return $this->belongsTo(Categories::class);
    }
}
