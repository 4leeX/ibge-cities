<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\City;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressControllerTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldShowAllAddress()
    {
        $request = $this->call('GET', '/api/address');

        $request->assertStatus(200);
    }

    public function testShouldCreateANewAddress()
    {

        $city = City::factory()->create();
        $selectCity = Address::factory()->create(['cities_id' => $city->id]);


        $payload = [
            'cities_id' => $selectCity->cities_id,
            'logradouro' => $selectCity->logradouro,
            'numero' => $selectCity->numero,
            'bairro' => $selectCity->bairro,
        ];

        $request = $this->call('POST', '/api/address', $payload);
        $request->assertStatus(201);
        $request->assertSee(['msg' => 'Address created successfully']);
    }

    public function testShouldUpdatedAAddress()
    {
        $city = City::factory()->create();
        $selectCity = Address::factory()->create(['cities_id' => $city->id]);


        $payload = [
            'cities_id' => $selectCity->cities_id,
            'logradouro' => $selectCity->logradouro,
            'numero' => $selectCity->numero,
            'bairro' => $selectCity->bairro,
        ];

        $request = $this->call('POST', "/api/address/{$selectCity->id}", $payload);
        $request->assertStatus(200);
        $request->assertSee(['msg' => 'Address updated successfully']);
    }

    public function testShouldDeletedAAdress()
    {
        $city = City::factory()->create();
        $selectCity = Address::factory()->create(['cities_id' => $city->id]);


        $payload = [
            'cities_id' => $selectCity->cities_id,
            'logradouro' => $selectCity->logradouro,
            'numero' => $selectCity->numero,
            'bairro' => $selectCity->bairro,
        ];

        $request = $this->call('DELETE', "/api/address/{$selectCity->id}", $payload);
        $request->assertStatus(200);
        $request->assertSee(['msg' => 'Address deleted successfully']);
    }
}
