<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Booking extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'booking_code' => $this->booking_code,
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'personal_identity' => $this->personal_identity,
            'organization_name' => $this->organization_name,
            'peoples_count' => $this->peoples_count,
            'schedule' => $this->whenLoaded('schedule', function () {
                return [
                    'start_at' => $this->schedule->start_at,
                    'end_at' => $this->schedule->end_at,
                ];
            }),
            'status' => $this->status,
        ];
    }
}
