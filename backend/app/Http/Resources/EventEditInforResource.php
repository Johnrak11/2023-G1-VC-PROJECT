<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventEditInforResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
            'time' => $this->time,
            'location' => $this->location,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'image' => $this->image,
            'venue' => $this->venue,
            'organizer_id' => $this->organizer_id,
            'category_id' => $this->category_id,
            'event_detail' => $this->details,
            'discounts' =>  EventDetailDiscountResource::collection($this->details),
            'agendas' => $this->agendas,

        ];
    }
}
