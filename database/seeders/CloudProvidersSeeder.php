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

        $cloudProviders = new CloudProviders();
        $cloudProviders->name = 'Microsoft Azure';
        $cloudProviders->url = 'www.microsoft.com';
        $cloudProviders->description = "Microsoft Azure Cloud Provider";
        $cloudProviders->datacenters = '3';
        $cloudProviders->enabled = 0;
        $cloudProviders->whitelisted = 1;
        $cloudProviders->save();

        $cloudProviders = new CloudProviders();
        $cloudProviders->name = 'Google Cloud';
        $cloudProviders->url = 'www.google.com';
        $cloudProviders->description = "Google Cloud Provider";
        $cloudProviders->datacenters = '9';
        $cloudProviders->enabled = 1;
        $cloudProviders->whitelisted = 0;
        $cloudProviders->save();

        $cloudProviders = new CloudProviders();
        $cloudProviders->name = 'Alibaba Azure';
        $cloudProviders->url = 'www.alibaba.com';
        $cloudProviders->description = "Alibaba Cloud Provider";
        $cloudProviders->datacenters = '1';
        $cloudProviders->enabled = 0;
        $cloudProviders->whitelisted = 0;
        $cloudProviders->save();
    }
}
