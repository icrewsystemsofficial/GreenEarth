<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'organization' => $faker->name,
                'phone' => $faker->phoneNumber
            ]);
            // \App\Models\User::factory(10)->create();
            $this->call(RolesandPermissionsSeeder::class);
            //TODO add DeveloperAccess seeder
        }
    }
}
