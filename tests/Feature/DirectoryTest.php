<?php

//namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

uses()->group('directory');
uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutExceptionHandling();
});


// TEST WRITING IS IN PROGRESS

test('Test#1: Check if Admin can view directory', function () {
    $this->get('/register')->assertStatus(200);
});

class RegistrationTest extends TestCase
{
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_add_business()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertAuthenticated();
        //$response->assertRedirect(RouteServiceProvider::HOME);

        $response2 = $this->get('/portal/admin/directory/create');
        $response2->assertStatus(200);

        $response3 = $this->post('/portal/admin/directory/create', [
            'business_name' =>  'Tesla Motors',
            'business_owner' =>  'Elon Musk',
            'brand_name' =>  'Tesla',
            'business_about' =>  'Sustainability?',
            'location' =>  'Fremont, CA',
            'facebook_link' =>  null,
            'instagram_link' =>  null,
            'linkedin_link' =>  null,
            'website_link' =>  null,
            'employee_count' =>  50,
            'business_founding_date' =>  null,
        ]);
        $response3->assertStatus(200);
        //$this->assertDirectoryIsWritable();
        $response3->assertRedirect('/portal/admin/directory/');
    }
}
