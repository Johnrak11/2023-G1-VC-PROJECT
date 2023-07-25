<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'ticket_code' => $this->ticket_code,
            'booking_date' => $this->booking_date,
            'is_check_in' => $this->is_check_in,
            'user_id' => $this->user_id,
            'event_id' => $this->event_id,
        ];
    }
}
