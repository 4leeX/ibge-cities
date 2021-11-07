<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class CityController extends Controller
{
    public function getAllCitiesFromIbge()
    {
        try {
            $cities = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/22/municipios');

            return response($cities);
        } catch (Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    public function getAllCitiesFromApi()
    {
        try {
            $cities = City::all();

            return response()->json($cities);
        } catch (Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    public function store(StoreCityRequest $request)
    {
        try {
            City::create($request->validated());

            return response()->json(['msg' => 'City created successfully.'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function importCities()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/22/municipios');
            $response = json_decode($response->getBody(), true);

            $data = collect($response);
            $data->map(function ($item) {
                City::create([
                    'nome' => $item['nome'],
                ]);
            });
            return response()->json(['msg' => 'Cities imported successfully']);
        } catch (Exception $exception) {
            return response()->json(['errors' => 'Error when imported cities']);
        }
    }
}
