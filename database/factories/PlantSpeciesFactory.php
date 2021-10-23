<?php

namespace Database\Factories;

use App\Models\PlantSpecies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlantSpeciesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlantSpecies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'common_name' => Str::random(50),
            'price_per_plant' => random_int(0, 100),
            'h2o_requirement_per_plant' => random_int(0, 100),
            'o2_production' => random_int(0, 100),
            'co2_absorption' => random_int(0, 100),
        ];
    }
}
