<?php

use App\Models\Tree;
use App\Models\TreesUpdates;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses()->group('trees');

beforeEach(function () {
    $this->withoutExceptionHandling();
});

test('Test#1: Check if trees index page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.tree.index'))->assertStatus(200);
});

test('Test#2: Check if add tree page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.tree.create'))->assertStatus(200);
});

test('Test#3: Check if user can add a tree', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.tree.store'),  array(
        'forest_id' => $tree->forest_id,
        'species_id' => $tree->species_id,
        'mission_id' => $tree->mission_id,
        //'cluster_id' => $tree->cluster_id,
        'planted_by' => $tree->planted_by,
        'health' => $tree->health,
        'lat' => $tree->lat,
        'long' => $tree->long,
    ))->assertStatus(302);
});

test('Test#4: Check if trees manage page renders', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.tree.manage', $tree->id))->assertStatus(200);
});

test('Test#5: Check if user can edit details of a tree', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->put(route('portal.admin.tree.update', $tree->id),  array(
        'forest_id' => $tree->forest_id,
        'species_id' => $tree->species_id,
        'mission_id' => $tree->mission_id,
        'health' => $tree->health,
        'lat' => $tree->lat,
        'long' => $tree->long,
    ))->assertStatus(302);
});

test('Test#6: Check if add updates (maintenance) page renders', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.tree.add_updates', $tree->id))->assertStatus(200);
});

test('Test#7: Check if user can add updates (maintenance) for a tree', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $update = TreesUpdates::factory()->create();

    $this->actingAs($user)->post(route('portal.admin.tree.store_updates', $tree->id),  array(
        'logo' => UploadedFile::fake()->image('logo.jpg'),
        'tree_id' => $tree->id,
        'remarks' => $update->remarks,
        'health' => $update->health,
        'updated_by' => $user->name,
    ))->assertStatus(302);
});

test('Test#8: Check if trees maintenance history page renders', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.tree.history_maintenance', $tree->id))->assertStatus(200);
});


?>

