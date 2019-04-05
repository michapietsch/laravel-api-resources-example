<?php

namespace Tests\Feature;

use App\Flight;
use App\Passenger;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class FlightsApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_returns_all_flights()
    {
        $flights = factory(Flight::class, 2)->create();
        $passenger = factory(Passenger::class)->create(['flight_id' => $flights[0]->id]);

        $this->get('/api/flights')
            ->assertJsonCount(2, 'data')
            ->assertJsonFragment([
                'id' => $flights[0]->id,
                'code' => $flights[0]->code,
            ]);
    }

    /** @test */
    public function by_default_index_does_not_include_passengers()
    {
        $flight = factory(Flight::class)->create();
        $passenger = factory(Passenger::class)->create(['flight_id' => $flight->id]);

        $this->get('/api/flights')
            ->assertJsonMissing([
                'name' => $passenger->name,
            ]);
    }

    /** @test */
    public function flights_index_can_include_passengers()
    {
        $this->be(factory(User::class)->create());

        $flight = factory(Flight::class)->create();
        $passenger = factory(Passenger::class)->create(['flight_id' => $flight->id]);

        $this->get('/api/flights?include=passengers')
            ->assertJsonFragment([
                'name' => $passenger->name,
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

    /** @test */
    public function by_default_a_single_flight_does_not_include_passengers()
    {
        $passenger = factory(Passenger::class)->create();

        $this->get('/api/flights/'.$passenger->flight_id)
            ->assertJsonMissing([
                'name' => $passenger->name,
            ]);
    }

    /** @test */
    public function a_single_flight_can_include_passengers()
    {
        $this->be(factory(User::class)->create());

        $passenger = factory(Passenger::class)->create();

        $this->get('/api/flights/'.$passenger->flight_id.'?include=passengers')
            ->assertJsonFragment([
                'name' => $passenger->name,
            ]);
    }

    /** @test */
    public function unauthenticated_users_can_not_view_the_passengers_included_in_a_flight()
    {
        $passenger = factory(Passenger::class)->create();

        $this->get('/api/flights/'.$passenger->flight_id.'?include=passengers')
            ->assertJsonMissing([
                'name' => $passenger->name,
            ]);
    }
}
