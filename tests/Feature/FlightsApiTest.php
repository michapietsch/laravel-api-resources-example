<?php

namespace Tests\Feature;

use App\Flight;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlightsApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_returns_all_flights()
    {
        $flights = factory(Flight::class, 2)->create();

        $this->get('/api/flights')
            ->assertJsonCount(2, 'data')
            ->assertJsonFragment([
                'id' => $flights[0]->id,
                'code' => $flights[0]->code,
            ]);
    }

    /** @test */
    public function show_returns_a_single_flight()
    {
        $flight = factory(Flight::class)->create();

        $this->get('/api/flights/'.$flight->id)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'id' => $flight->id,
                'code' => $flight->code,
            ]);
    }
}
