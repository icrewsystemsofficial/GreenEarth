<?php

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses()->group('announcements');
uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutExceptionHandling();
});

test('Test#1: Check if Announcement Page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('portal.announcements.index'))->assertStatus(200);
});

test('Test#2: Check if the user can view announcements individually', function () {
    $user = User::factory()->create();
    $announcement = Announcement::factory()->create();
    $this->actingAs($user)->get(route('portal.announcements.view', $announcement->id))->assertStatus(200);
});

test('Test#3: Check if create new Announcement Page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.announcements.create'))->assertStatus(200);
});

test('Test#4: Check if Admin is able to create a new Announcement', function () {
    $user = User::factory()->create();
    $announcement = Announcement::factory()->raw();
    $this->actingAs($user)->post(route('portal.admin.announcements.store'),  array(
        'title' => $announcement['title'],
        'body' => $announcement['body'],
        'status' => $announcement['status'],
        'role' => $announcement['role'],
    ))->assertStatus(302);
});

test('Test#5: Check if manage announcement Page renders', function () {
    $user = User::factory()->create();
    $announcement = Announcement::factory()->create();
    $this->actingAs($user)->get(route('portal.admin.announcements.edit', $announcement->id))->assertStatus(200);
});

test('Test#6: Check if Admin is able to edit an announcement', function () {
    $user = User::factory()->create();
    $announcement = Announcement::factory()->create();
    $this->actingAs($user)->put(route('portal.admin.announcements.update', $announcement->id),  array(
        'title' => $announcement->title,
        'body' => $announcement->body,
        'status' => $announcement->status,
        'role' => $announcement->role,
    ))->assertStatus(302);
});