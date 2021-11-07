<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\City;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnderecoControllerTest extends TestCase
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
        $request = $this->call('GET', '/api/endereco');

        $request->assertStatus(200);
    }

    public function testShouldCreateANewAddress()
    {
        // $this->withoutExceptionHandling();

        $city = City::factory()->create();

        // $address = Address::factory()->create();
        $selectCity = Address::factory()->create(['cities_id' => $city->id]);


        $payload = [
            // 'id' => $selectCity->id,
            'cities_id' => $selectCity->cities_id,
            'logradouro' => $selectCity->logradouro,
            'numero' => $selectCity->numero,
            'bairro' => $selectCity->bairro,
        ];

        $request = $this->call('POST', '/api/endereco', $payload);
        $request->assertStatus(201);
        $request->assertSee(['msg' => 'Address created successfully']);
    }

    public function testShouldUpdatedAAddress()
    {
        // $this->withoutExceptionHandling();

        $city = City::factory()->create();

        // $address = Address::factory()->create();
        $selectCity = Address::factory()->create(['cities_id' => $city->id]);


        $payload = [
            // 'id' => $selectCity->id,
            'cities_id' => $selectCity->cities_id,
            'logradouro' => $selectCity->logradouro,
            'numero' => $selectCity->numero,
            'bairro' => $selectCity->bairro,
        ];

        $request = $this->call('POST', "/api/endereco/{$selectCity->id}", $payload);
        $request->assertStatus(200);
        $request->assertSee(['msg' => 'Address updated successfully']);
    }

    public function testShouldDeletedAAdress()
    {
        $city = City::factory()->create();

        // $address = Address::factory()->create();
        $selectCity = Address::factory()->create(['cities_id' => $city->id]);


        $payload = [
            // 'id' => $selectCity->id,
            'cities_id' => $selectCity->cities_id,
            'logradouro' => $selectCity->logradouro,
            'numero' => $selectCity->numero,
            'bairro' => $selectCity->bairro,
        ];

        $request = $this->call('DELETE', "/api/endereco/{$selectCity->id}", $payload);
        $request->assertStatus(200);
        $request->assertSee(['msg' => 'Address deleted successfully']);
    }
}
