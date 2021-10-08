<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\GHGEmission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GHGEmissionsDataSeeder extends Seeder
{
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
        DB::table('g_h_g_emissions')->truncate();
        $this->command->info('Seeding Global Green House Gas Emission Data to database...please wait');
        $csv = __DIR__.'/../data/global_ghg_emissions.csv';
        $csv_array = $this->csvToArray($csv);

        $imported = 0;
        $country_array = array();

        $survey_data_years = range(1961, 2020);

        for($i = 0; $i < count($csv_array); $i ++)
        {
            $country = '';
            $country = (object) $csv_array[$i];


            $country_data_by_code = array();
            foreach($country as $country_survey_data => $emission) {
                if(!is_numeric($country_survey_data)) {
                    $country_data_by_code['country'] = $country_survey_data;
                    echo $country_survey_data;
                } else {
                    $country_data_by_code['year'] = $country_survey_data;
                    $country_data_by_code['emission'] = $emission;
                    echo $emission;
                }
            }

            dd($country_data_by_code);



            // Check if country exists.
            $check_if_country_exists = Country::where('code_full', $country->country_code)->first();
            if($check_if_country_exists) {
                $country_array[] = array(
                    'country' => $country->country_code,
                    'year' => $country->year,
                    'emission' => $country->emission,
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                );

                dd($country_array);

                $imported++;
            } else {
                $this->command->info($country->country.': country not found');
            }

        }


        $chunks = array_chunk($country_array, 5000);
        $this->command->getOutput()->progressStart(1);

        foreach($chunks as $chunk) {
            GHGEmission::insert($chunk);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish(26);

        $this->command->info('Totally, imported '.$imported.' entries of Global Green House Gas Emissions');
    }
}
