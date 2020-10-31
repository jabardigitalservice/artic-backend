<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Vinkla\Hashids\Facades\Hashids;

class Schedule extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $quotaMaximum = 30;

        $quotaAvailable = ($quotaMaximum - $this->peoples_count);

        return [
            'id' => Hashids::encode($this->id),
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'peoples_count' => $this->peoples_count,
            'quota_available' => $quotaAvailable,
        ];
    }
}
