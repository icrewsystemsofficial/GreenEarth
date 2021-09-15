<?php

namespace Database\Factories;

use App\Models\Tree;
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
        return [
            'name' => $this->faker->lastName,
            'description' => $this->faker->text,
            'location' => $this->faker->address,
            'created_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
