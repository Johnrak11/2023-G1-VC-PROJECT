<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventDetailRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'available_ticket'=>$this->available_ticket,
            'restriction'=>$this->restriction,
            'description'=>$this->description,
            'price'=>$this->price,
            'event_id'=>$this->event_id,
        ];
    }
}
