<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit_Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cvv',
        'number',
        'type',
        'expiration',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
