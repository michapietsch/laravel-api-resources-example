<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Passenger;

class FlightResource extends JsonResource
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
            'id' => $this->id,
            'code' => $this->code,
            'passengers' => $this->when(
                optional(auth()->user())->can('browse', Passenger::class),
                PassengerResource::collection($this->whenLoaded('passengers'))
            ),
        ];
    }
}
