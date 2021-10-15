<?php

use App\Mail\SendContactMailtoAdmins;
use App\Mail\SendContactMailtoUser;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

test('Test#1: Check if Frontend Contact Page renders', function () {
    $this->get('/home/contact')->assertStatus(200);
});

test('Test#2: Check if data is sumbitted from the Contact Page', function () {
    $contact = Contact::factory()->create();
    $this->post('/portal/admin/contact-requests/4',  array(
        'email' => $contact->email,
        'type' => $contact->type,
        'body' => $contact->body,
        'status' => $contact->status,
    ))->assertStatus(302);
});

test('Test#3: Check if Contact Page sends the mail to the User and the Admin', function () {
    $contact = Contact::factory()->create();
    $user = User::factory()->create();
    Mail::fake();
    Mail::to($contact->email)->send(new SendContactMailtoUser(['body' => 'hello']));
    Mail::to($user->email)->send(new SendContactMailtoAdmins(['body' => 'hello']));
    Mail::assertSent(SendContactMailtoUser::class);
    Mail::assertSent(SendContactMailtoAdmins::class);
});

test('Test#4: Check if Manage Contact Page (portal) renders', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/portal/admin/contact-requests')->assertStatus(200);
});

test('Test#5: Check if Edit Contact Status page renders', function () {
    $user = User::factory()->create();
    $contact = Contact::factory()->create();
    $this->actingAs($user)->get('/portal/admin/contact-requests/' . $contact->id)->assertStatus(200);
});

test('Test#6: Check if Contact Request Status can be updated by the Admin', function () {
    $user = User::factory()->create();
    $contact = Contact::factory()->create();
    $this->actingAs($user)->post('/portal/admin/contact-requests/' . $contact->id,  array(
        'status' => $contact->status
    ))->assertStatus(302);
});
