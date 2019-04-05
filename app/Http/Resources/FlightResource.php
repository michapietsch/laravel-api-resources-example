<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Passenger;
use App\Flight;

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
            'total_seats' => $this->when(
                optional(auth()->user())->can('flight.view.total_seats', Flight::class),
                $this->total_seats
            ),
            'passengers' => $this->when(
                optional(auth()->user())->can('browse', Passenger::class),
                PassengerResource::collection($this->whenLoaded('passengers'))
            ),
        ];
    }
}
