<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tree;
use App\Models\TreesUpdates;
use App\Helpers\TreesHealthHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreesUpdatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TreesUpdates::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $treeHealth = TreesHealthHelper::health();
        $trees = Tree::pluck('id');
        $users = User::pluck('name');
        return [
        'tree_id' => Tree::all()->random()->id,
        'remarks' => $this->faker->text,
        'health' => $treeHealth[rand(0, count($treeHealth) - 1)],
        'image_path' => $this->faker->imageUrl,
        'updated_by' => User::all()->random()->name,
        ];
    }
}
