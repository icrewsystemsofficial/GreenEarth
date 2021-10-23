<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\PlantSpecies;


/* uses(RefreshDatabase::class);

it('has plantspecies page', function () {
    $response = $this->get(route('portal.admin.forests.trees-species.create'));
    $response->assertStatus(200);
});


 */

uses(RefreshDatabase::class);

test('Test#1: Check if Create page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.forests.trees-species.create'))->assertStatus(200);
});

test('Test#2: Check if the new plant species data is stored properly', function () {
    $plant_species = PlantSpecies::factory()->create();
    $user = User::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.forests.trees-species.save'),  array(
        'common_name' => $plant_species->common_name,
        'price_per_plant' => $plant_species->price_per_plant,
        'h2o_requirement_per_plant' => $plant_species->h2o_requirement_per_plant,
        'o2_production' => $plant_species->o2_production,
        'co2_absorption' => $plant_species->co2_absorption,
    ))->assertStatus(302);
});
