<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CityControllerTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldShowAllCities()
    {
        $request = $this->call('GET', '/api/cities');

        $request->assertStatus(200);
    }

    public function testShoulCreateACity()
    {
        $city = City::factory()->create();

        $payload = [
            'nome' => $city->nome,
        ];

        $request = $this->call('POST', '/api/cities', $payload);
        $request->assertStatus(201);
        $request->assertSee(['msg' => 'City created successfully.']);
    }

    public function testShoulBeSucceedWhenImportTheCities()
    {
        $payload = [
            'id' => '867',
            'nome' => 'Teresina',
        ];

        $request = $this->call('POST', '/api/import', $payload);
        $request->assertStatus(200);
        $request->assertSee(['msg' => 'Cities imported successfully']);
    }
}
