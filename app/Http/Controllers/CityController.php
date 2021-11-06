<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class CityController extends Controller
{
    public function getAllCities()
    {
        $cities = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/22/municipios');

        return response($cities);
    }

    public function store(StoreCityRequest $request)
    {
        City::create($request->validated());

        return response()->json(['msg' => 'City created successfullt.'], 201);
    }

    public function importCities()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/22/municipios');
        $response = json_decode($response->getBody(), true);

        $data = collect($response);
        $data->map(function ($item) {
            City::create([
                'nome' => $item['nome'],
            ]);
        });
    }
}
