<?php

namespace App\Helpers;

use stdClass;

class CO2Helper {


    public function co2factor($country = 'USA') {
        $countries = array(
            'FINLAND' => 0.33852,
            'UK' => 0.223,
            'USA' => 0.709,
        );

        return $countries[$country];
    }


    public function consumptions(
        $consumption,
        $co2_factor = null,
        $manufacturing_emission = null
        ) : array {

        if($co2_factor == null) {
            $co2_factor = $this->co2factor();
        }

        return array(
            'cloud_green' => (($this->convert_kwh_to_kgco2e($consumption * 0)) + ($manufacturing_emission * 0.5)),
            'cloud_nongreen' => ($this->convert_kwh_to_kgco2e($consumption)) + ($manufacturing_emission * 0.5),
            'selfhosted_green' => ($this->convert_kwh_to_kgco2e($consumption * 0.2)) + ($manufacturing_emission),
            'selfhosted_nongreen' => ($this->convert_kwh_to_kgco2e($consumption * 1)) + ($manufacturing_emission),
        );
    }

    public function serverTypes() : object {

        // ALL UNITS ARE IN KILO GRAMS.
        // Source: @https://www.goclimate.com/blog/the-carbon-footprint-of-servers/

        $servers = array();

        $servers['2019_R640_Dell_Server'] = array(

            'consumptions' => $this->consumptions(
                $consumption = 1760, // Per year
                $co2_factor = $this->co2factor('USA'),
                $manufacturing_emission = 320
            ),

            'lifespan' => 4, // In years
            'manufacturing_climate_impact' => 320, //year
        );

        $servers['2017_R740_Dell_Server'] = array(

            'consumptions' => $this->consumptions(
                $consumption = 1960, // Per year
                $co2_factor = $this->co2factor('USA'),
                $manufacturing_emission = 320
            ),

            'lifespan' => 4, // In years
            'manufacturing_climate_impact' => 320, //year
        );

        return (object) $servers;
    }

    public function convert_kwh_to_kgco2e($kwh = '1', $country = null) {
        // 1 kWh = 0.223 kg CO2e
        $co2_factor = $this->co2factor('USA');
        return $kwh * $co2_factor;
    }

    public function calculate(
        $age = '1',
        $country = null,
        $server = '2019_R640_Dell_Server',
        $server_type = 'cloud_nongreen',
        $traffic = '1000'
    ) {
        // if($country == null) {
        //     throw new \Exception('Country should be provided to calculate the Carbon Footprint');
        // }


        // Get the server details.
        $consumptions = $this->consumptions(
            $consumption = 1760, // Per year
            $co2_factor = $this->co2factor('USA'), // We use the values for USA as fallback
            $manufacturing_emission = 320
        );

        $server_lifespan = 4; // In Years.
        $manufacturing_climate_impact = 320; // In Kilograms

        $consumption = $consumptions[$server_type] + ($traffic / 10);
        $specific_consumption_per_year = $consumption;

        if($age >= 4) {
            $lifetime_consumptions = ($consumption * $age) + ($manufacturing_climate_impact * ($age / $server_lifespan));
        } else {
            $lifetime_consumptions = ($consumption * $age) + $manufacturing_climate_impact;
        }


        // Get the country details.
        $country = $this->co2factor();


        //Trees calculation

        $trees = $this->co2_to_trees($specific_consumption_per_year);

        $response = array();
        $response['specific_consumption_per_year'] = number_format($specific_consumption_per_year, 2);
        $response['lifetime_consumptions'] = number_format($lifetime_consumptions, 2);
        $response['trees_required'] = number_format($trees['trees_required']);
        $response['oxygen'] = number_format($trees['trees_required'] * 300);

        return $response;
    }

    public function convert_kgco2e_to_kwh() {

    }

    public function co2_to_trees($kgco2 = 1000) {
        // One beema bamboo tree can offset ~300 KG of CO2.
        $trees = array(
            'beema_bamboo' => array(
                'per_year' => 300,
                'per_acre_per_year' => 62000,
            ),
        );

        //How many trees does it take every year to offset the emission.

        $required_trees = ceil($kgco2 / $trees['beema_bamboo']['per_year']);


        $response = array();
        $response['offset_required'] = $kgco2;
        $response['trees_required'] = $required_trees;
        $response['tree_name'] = 'Beema Bamboo';
        return $response;
    }

    public function index() {

    }

    public static function whitelisted_hosting_providers() : object {

        $providers = array();

        $providers[] = array(
            'name' => 'Digital Ocean',
            'logo' => null,
            'datacenters' => '5',
        );

        $providers[] = array(
            'name' => 'Google Cloud',
            'logo' => null,
            'datacenters' => '5',
        );

        $providers[] = array(
            'name' => 'Microsoft Azure',
            'logo' => null,
            'datacenters' => '5',
        );

        $providers[] = array(
            'name' => 'Krystal',
            'logo' => null,
            'datacenters' => '2',
        );



        return (object) $providers;
    }
}
?>
