<?php

namespace Database\Seeders;

use App\Models\CloudProviders;
use Illuminate\Database\Seeder;

class CloudProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cloudProviders = new CloudProviders();
        $cloudProviders->name = 'Amazon';
        $cloudProviders->url = 'www.amazon.com';
        $cloudProviders->description = "Amazon Cloud Provider";
        $cloudProviders->datacenters = '6';
        $cloudProviders->enabled = 1;
        $cloudProviders->whitelisted = 1;
        $cloudProviders->save();

    }
}
