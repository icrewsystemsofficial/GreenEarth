<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Mail\SendWelcomeMail;
use Illuminate\Support\Facades\Mail;

uses()->group('users');
uses(RefreshDatabase::class);


beforeEach(function () {

    $this->withoutExceptionHandling();

    $this->user = User::factory()->create();

    $this->actingAs($this->user);


    $this->id = $this->user->id;
    // $this->name = $user->name;
    // $this->email = $user->email;
    // $this->role = $user->role;

});

test('Test #1: has usermanagement page', function () {

    $this->get(route('portal.admin.users.create'))->assertStatus(200);
});

test('Test #2: has createuser page', function () {

    $this->get(route('portal.admin.users.create'))->assertStatus(200);
});

test('Test #3: has modifyuser page', function () {

    $this->get('/portal/admin/users/manage/' . $this->id)->assertStatus(200);
});

test('Test #4: Check if the new user is stored properly', function () {

    $role = Role::create(['name' => 'user']);

    $data = [
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => 'password',
        'role' => $role['name'],
    ];

    $this->post(route('portal.admin.users.store', $data))
        ->assertRedirect(route('portal.admin.users.index'));
});

test('Test #5: Check if the new user is getting updated', function () {

    $role = Role::create(['name' => 'user']);

    $data = [
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => 'password',
        'role' => $role['name'],
    ];

    $newuser = User::create($data);

    $data['name'] = 'new name';

    $this->from(route('portal.admin.users.manage', $newuser))
        ->post(route('portal.admin.users.update', $newuser->id), $data)
        ->assertStatus(302);

    $this->assertDatabaseHas('users', [
        'id' => $newuser->id,
        'name' => 'new name'
    ]);
});

test('Test #6: Check if the new user is getting deleted', function () {

    $role = Role::create(['name' => 'user']);

    $data = [
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => 'password',
        'role' => $role['name'],
    ];

    $newuser = User::create($data);

    $this->from(route('portal.admin.users.manage', $newuser))
        ->post(route('portal.admin.users.delete', $newuser->id), $data)
        ->assertStatus(302);

    $this->assertDatabaseMissing('users', [
        'id' => $newuser->id,
        'name' => 'new name'
    ]);
});

test('Test #7: Check for validation', function () {

    $role = Role::create(['name' => 'user']);

    $data = [
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => 'password',
        'role' => $role['name'],
    ];

    $newuser = User::create($data);

    $this->from(route('portal.admin.users.manage', $newuser))
        ->post(route('portal.admin.users.update', $newuser->id), $data)
        ->assertStatus(302);
        
});

test('Test #9: Check if new users are welcomed by email', function () {
    $user = User::factory()->create();
    Mail::fake();
    Mail::to($user->email)->send(new SendWelcomeMail(['body' => 'hello']));
    Mail::assertSent(SendWelcomeMail::class);
});