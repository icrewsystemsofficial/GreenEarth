<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // I'm aware that only an Admin can add a new business, though I am not sure how the Users module works exactly and my main goal is to try and test whether or not a new business could be added.
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
