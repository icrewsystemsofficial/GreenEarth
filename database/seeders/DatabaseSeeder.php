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

        // \App\Models\User::factory(10)->create();
        $this->call(DeveloperAccessSeeder::class);
        $this->call(RolesandPermissionsSeeder::class);
        $this->call(FAQSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CloudProvidersSeeder::class);
        //TODO add DeveloperAccess seeder

    }
}
