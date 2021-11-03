<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\PlantSpecies;


uses()->group('plantspecies');
uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutExceptionHandling();
});

test('Test#1: Check if Index page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.forests.trees-species.index'))->assertStatus(200);
});


test('Test#2: Check if Create page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.forests.trees-species.create'))->assertStatus(200);
});

test('Test#3: Check if the new plant species data is stored properly', function () {
    $user = User::factory()->create();
    $plant_specie = PlantSpecies::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.forests.trees-species.save'),  array(
        'name' => $plant_specie->common_name,
        'ppplant' => $plant_specie->price_per_plant,
        'h2oreq' => $plant_specie->h2o_requirement_per_plant,
        'o2pro' => $plant_specie->o2_production,
        'co2abs' => $plant_specie->co2_absorption,

    ))->assertStatus(302);
});

test('Test#4: Check if the new plant species data is stored properly without adding all the required fields', function () {
    $user = User::factory()->create();
    $plant_specie = PlantSpecies::factory()->create();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post(route('portal.admin.forests.trees-species.save'),  array(
        //missing field - common_name
        'ppplant' => $plant_specie->price_per_plant,
        'h2oreq' => $plant_specie->h2o_requirement_per_plant,
        'o2pro' => $plant_specie->o2_production,
        'co2abs' => $plant_specie->co2_absorption,
    ));

});

test('Test#5: Check if the new plant species data is stored properly with an empty model', function () {
    $user = User::factory()->create();
    $plant_specie = PlantSpecies::factory()->create();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post(route('portal.admin.forests.trees-species.save'),  array(
        'name' => '',
        'ppplant' => '',
        'h2oreq' => '',
        'o2pro' => '',
        'co2abs' => '',
    ));
});

test('Test#6: Check if Manage page renders', function () {
    $user = User::factory()->create();
    $plant_specie = PlantSpecies::factory()->create();
    $this->actingAs($user)->get('portal/admin/forests/trees-species/manage/' . $plant_specie->id)->assertStatus(200);
});

test('Test#7: Check if data of existing plant species can be editted', function () {
    $user = User::factory()->create();
    $plant_specie = PlantSpecies::factory()->create();
    $this->actingAs($user)->post('/portal/admin/forests/trees-species/update/'. $plant_specie->id,  array(
        'name' => $plant_specie->common_name,
        'ppplant' => $plant_specie->price_per_plant,
        'h2oreq' => $plant_specie->h2o_requirement_per_plant,
        'o2pro' => $plant_specie->o2_production,
        'co2abs' => $plant_specie->co2_absorption,
    ))->assertStatus(302);
});

test('Test#8: Check if data of existing plant species can be editted without adding all the required fields', function () {
    $user = User::factory()->create();
    $plant_specie = PlantSpecies::factory()->create();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post('/portal/admin/forests/trees-species/update/'. $plant_specie->id,  array(
        //missing field - common_name
        'ppplant' => $plant_specie->price_per_plant,
        'h2oreq' => $plant_specie->h2o_requirement_per_plant,
        'o2pro' => $plant_specie->o2_production,
        'co2abs' => $plant_specie->co2_absorption,
    ));

});

test('Test#9: Check if data of existing plant species can be editted with an empty model', function () {
    $user = User::factory()->create();
    $plant_specie = PlantSpecies::factory()->create();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post('/portal/admin/forests/trees-species/update/'. $plant_specie->id,  array(
        'name' => '',
        'ppplant' => '',
        'h2oreq' => '',
        'o2pro' => '',
        'co2abs' => '',
    ));

});
