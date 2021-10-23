<?php

namespace Database\Factories;

use App\Models\Tree;
use App\Models\User;
use App\Helpers\TreesHealthHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tree::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $treeHealth = TreesHealthHelper::health();
        $users = User::pluck('id');
        return [
            'forest_id' => $this->faker->randomDigit,
            'species_id' => $this->faker->randomDigit,
            'mission_id' => $this->faker->randomDigit,
            //'cluster_id' => $this->faker->randomDigit,
            'planted_by' => $this->faker->randomElement($users),
            'health' => $treeHealth[rand(0, count($treeHealth) - 1)],
            'lat' => $this->faker->latitude,
            'long' => $this->faker->longitude,
        ];
    }
}
