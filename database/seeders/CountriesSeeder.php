<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    function csvToArray($filename = '', $delimiter = ',')
    {
        if(!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
    public function run()
    {
        DB::table('countries')->truncate();
        $this->command->info('Seeding Countries to database...please wait');
        $csv = __DIR__.'/../data/countries_new.csv';
        $csv_array = $this->csvToArray($csv);

        $imported = 0;
        $country_array = array();

        for($i = 0; $i < count($csv_array); $i ++)
        {
            $country = '';
            $country = (object) $csv_array[$i];

            $country_array[] = array(
                'name' => $country->name,
                'code' => $country->code,
                'code_full' => $country->code_full,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            );

            $imported++;

        }


        $chunks = array_chunk($country_array, 100);
        $this->command->getOutput()->progressStart(1);

        foreach($chunks as $chunk) {
            Country::insert($chunk);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish(26);

        $this->command->info('Totally, imported '.$imported.' coutries');
    }
}
