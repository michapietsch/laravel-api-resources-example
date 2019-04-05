<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Http\Resources\FlightResource;

class FlightController extends Controller
{
    public function index()
    {
        return FlightResource::collection(Flight::all());
    }

    public function show(Flight $flight)
    {
        return FlightResource::make($flight);
    }
}
