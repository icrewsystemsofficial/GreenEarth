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


        // $servers['2017_R740_Dell_Server'] = array(
            
        //     'consumptions' => array(
        //         'cloud_green' => array('per_year_emission' => 160, 'electicity_consumption' => 1100),
        //         'cloud_nongreen' => array('per_year_emission' => 458, 'electicity_consumption' => 1100),
        //         'selfhosted_green' => array('per_year_emission' => 320, 'electicity_consumption' => 1100),
        //         'selfhosted_nongreen' => array('per_year_emission' => 916, 'electicity_consumption' => 1100),            
        //     ),

        //     'lifespan' => 4, // In years
        //     'manufacturing_climate_impact' => 320, //year
        // );
        

        // $response = array(            
        //     'model_no' => '2019 R640 Dell server',
        //     'co2_factor' => 0.33852, //CO2e / kWh, 1 kWh = 0.223 kg CO2e
        //     'units' => array(
        //         'emission' => 'kg',
        //         'electricity' => 'kWh',
        //     ),
        //     'lifespan' => '4 years',
        //     'manufacturing_climate_impact' => 320, //year
        //     'server_types' => $servers,
        // );


        return (object) $servers;
    }

    public function convert_kwh_to_kgco2e($kwh = '1', $country = null) {
        // 1 kWh = 0.223 kg CO2e
        $co2_factor = $this->co2factor('USA');
        return ($kwh * $co2_factor);   
    }

    public function convert_kgco2e_to_kwh() {

    }

    public function co2_to_trees() {

    }

    public function index() {

    }
}
?>