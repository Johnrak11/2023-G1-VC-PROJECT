<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_code',
        'booking_date',
        'is_check_in',
        'user_id',
        'event_id'
    ];
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public static function createTicket($request){
        $tikets = Ticket::create([
            'ticket_code' => $request->ticket_code,
            'booking_date' => $request->booking_date,
            'is_check_in' => $request->is_check_in,
            'user_id' => $request->user_id,
            'event_id' => $request->event_id
        ]);
        return $tikets;
    }
}
