<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'cities_id' => City::inRandomOrder()->first()->id,
            'logradouro' => $this->faker->text(30),
            'numero' => $this->faker->numberBetween(1, 99999),
            'bairro' => $this->faker->name,
        ];
    }
}
