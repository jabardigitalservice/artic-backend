<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Vinkla\Hashids\Facades\Hashids;

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
        $id = Hashids::encode($this->id);

        $url = URL::route(
            'registration.document',
            ['id' => $id]
        );

        return [
            $this->mergeWhen($request->user(), [
                'id' => $id,
            ]),
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
            'document_url' => $url,
            'status' => $this->status,
        ];
    }
}
