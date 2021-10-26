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
    $this->actingAs($user)->get('portal/admin/tree/')->assertStatus(200);
});

test('Test#2: Check if add tree page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('portal/admin/tree/create')->assertStatus(200);
});

test('Test#3: Check if user can add a tree', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->raw();
    $this->actingAs($user)->post('portal/admin/tree/create',  array(
        'forest_id' => $tree['forest_id'],
        'species_id' => $tree['species_id'],
        'mission_id' => $tree['mission_id'],
        'cluster_id' => $tree['cluster_id'],
        'planted_by' => $tree['planted_by'],
        'health' => $tree['health'],
        'lat' => $tree['lat'],
        'long' => $tree['long'],
    ))->assertStatus(302);
});

test('Test#4: Check if user can add a tree without adding all the required fields', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->raw();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post('portal/admin/tree/create',  array(
        //missing fields - forest_id, health
        'species_id' => $tree['species_id'],
        'mission_id' => $tree['mission_id'],
        'cluster_id' => $tree['cluster_id'],
        'planted_by' => $tree['planted_by'],
        'lat' => $tree['lat'],
        'long' => $tree['long'],
    ));
    
});

test('Test#5: Check if user can add a tree with an empty model', function () {
    $user = User::factory()->create();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post('portal/admin/tree/create', [
        'forest_id' => '',
        'species_id' => '',
        'mission_id' => '',
        'cluster_id' => '',
        'planted_by' => '',
        'health' => '',
        'lat' => '',
        'long' => '',
    ]);
});

test('Test#6: Check if trees manage page renders', function () {
    $user = User::factory()->create();
    $trees = Tree::factory()->create();
    $this->actingAs($user)->get('portal/admin/tree/manage/'.$trees->id)->assertStatus(200);
});

test('Test#7: Check if user can edit details of a tree', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->put('portal/admin/tree/manage/'.$tree->id,  array(
        'forest_id' => $tree->forest_id,
        'species_id' => $tree->species_id,
        'mission_id' => $tree->mission_id,
        'cluster_id' => $tree->cluster_id,
        'health' => $tree->health,
        'lat' => $tree->lat,
        'long' => $tree->long,
    ))->assertStatus(302);
});

test('Test#8: Check if add updates (maintenance) page renders', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->get('portal/admin/tree/update/'.$tree->id)->assertStatus(200);
});

test('Test#9: Check if user can add updates (maintenance) for a tree', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user);
    $file = UploadedFile::fake()->image('logo.jpg');
    $response = $this->json('POST', route('api.v1.upload_tree_updates'), [
        'logo' => $file
    ])->content();
    $this->post('portal/admin/tree/update/'.$tree->id,  array(
        'logo' => $response,
        'remarks' => 'okay',
        'health' => 'Healthy',
    ))->assertStatus(302);
});

test('Test#10: Check if user can add updates (maintenance) for a tree without adding all the required fields', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $update = TreesUpdates::factory()->raw();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post('portal/admin/tree/update/'.$tree->id,  array(
        //missing fields - logo and remarks
        'tree_id' => $tree['id'],
        'health' => $update['health'],
        'updated_by' => $user['name'],
    ));
});

test('Test#11: Check if user can add updates (maintenance) for a tree with an empty model', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $update = TreesUpdates::factory()->raw();
    $this->expectException('Illuminate\Validation\ValidationException');
    $this->actingAs($user)->post('portal/admin/tree/update/'.$tree->id, []);
});

test('Test#12: Check if trees maintenance history page renders', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->get('portal/admin/tree/history/'.$tree->id)->assertStatus(200);
});

test('Test#13: Check if trees can be destroyed', function () {
    $user = User::factory()->create();
    $tree = Tree::factory()->create();
    $this->actingAs($user)->get('portal/admin/tree/delete/'.$tree->id)->assertStatus(302);
});


?>

