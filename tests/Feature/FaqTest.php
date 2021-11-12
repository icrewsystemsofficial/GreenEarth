<?php

use App\Models\User;
use App\Models\Faq;
use FontLib\Table\Type\name;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses()->group('faq');
uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutExceptionHandling();
});

test('Test#1: Check if Frontend FAQ Page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/home/faq')->assertStatus(200);
});

test('Test#2: Check if Portal(Non-admin) FAQ Page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/portal/faq')->assertStatus(200);
});

test('Test#3: Check if you can view a FAQ individually from Portal(Non-admin) FAQ Page', function () {
    $id = random_int(1, 5);
    $faq = FAQ::factory()->create();
    $slug = Str::slug($faq->title, '-');
    $user = User::factory()->create();
    $this->actingAs($user)->get('/portal/faq/detail/' . $faq->id)->assertStatus(302);
    $this->actingAs($user)->get('/portal/faq/' . $slug)->assertStatus(200);
});

test('Test#4: Check if Portal(Admin) FAQ Page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/portal/admin/faq')->assertStatus(200);
});

test('Test#5: Check if create new FAQ page renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/portal/admin/faq/create')->assertStatus(200);
});

test('Test#6: Check if Admin is able to add a new FAQ', function () {
    $user = User::factory()->create();
    $faq = FAQ::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.faq.store'),  array(
        'title' => $faq->title,
        'body' => $faq->body,
        'created_by' => $faq->created_by,
        'status' => $faq->status,
    ))->assertStatus(302);
});

test('Test#7: Check if manage FAQ page renders', function () {
    $user = User::factory()->create();
    $faq = FAQ::factory()->create();
    $this->actingAs($user)->get('/portal/admin/faq/edit/' . $faq->id)->assertStatus(200);
});

test('Test#8: Check if Admin is able to edit a FAQ', function () {
    $user = User::factory()->create();
    $faq = FAQ::factory()->create();
    $this->actingAs($user)->post(route('portal.admin.faq.update', $faq->id),  array(
        'title' => $faq->title,
        'body' => $faq->body,
        'status' => $faq->status,
    ))->assertStatus(302);
});

test('Test#9: Check if Admin is able to delete a FAQ', function () {
    $user = User::factory()->create();
    $faq = FAQ::factory()->create();
    $this->actingAs($user)->get('/portal/admin/faq/delete/' . $faq->id)->assertStatus(302);
});