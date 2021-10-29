<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

uses()->group('users');

beforeEach(function () {
    $this->withoutExceptionHandling();
});

test('Test #1: has usermanagement page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post(route('portal.admin.users.add_user'),  array(
        'name' => $user->name,
        'email' => $user->email,
        'password' => $user->password,
        'role' => $user->role,

    ))->assertStatus(302);

});

test('Test #2: has createuser page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('portal.admin.users.create'))->assertStatus(200);
});

test('Test #3: has modifyuser page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('portal.admin.users.manage' . $user->id))->assertStatus(200);
});

test('Test#4: Check if the new user is stored properly', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.users.add_user'),  array(
        'name' => $user->name,
        'email' => $user->email,
        'password' => $user->password,

    ))->assertStatus(302);
});

test('Test#5: Check if the new user is stored properly without required fields', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.users.add_user'),  array(
        //missing field - name
        'email' => $user->email,
        'password' => $user->password,

    ))->assertStatus(302);
});

test('Test#6: Check if the new user is stored properly with empty model', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.users.add_user'),  array(
        'name' => $user->name,
        'email' => $user->email,
        'password' => $user->password,

    ))->assertStatus(302);
});

