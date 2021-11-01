<?php

namespace App\Http\Controllers;

use App\Helpers\CO2Helper;
use App\Helpers\PHPWhois;

class CalculationController extends Controller
{
    /*
     * LOGIC:
     *
     * 1. Get Domain AGE via DNS lookup + Get basic data from WHOIS
     * 2. Check if Server is whitelisted for GreenEnergy, if yes, just proceed
     * to certification.
     * 3. If no, calculate the average power consumption per day by the server
     * 4. Based on site viewers (See if we can get this data online), calculate the
     *  CO2 emission.
     * 5. Show them how much they need to pay for going carbon neutral.
     * 6. Once they pay, generate PDF certificate
     * 7. Add JS library to the website.
     * 8. This JS library should send back analytics report to our API so that
     *  if the number of users go up, we can automatically alert them and charge accordingly.
     * 9. The superadmins should have control over the status of the website.
     * 10. Once status is changed on our portal, it should reflect on client site.
     *
    */

    public function frontend()
    {
        $url = request('website');
        $url = filter_var($url, FILTER_VALIDATE_URL);
        $domain = trim($url);
        if (substr(strtolower($domain), 0, 8) === 'https://') {
            $domain = substr($domain, 8);
        }
        if (substr(strtolower($domain), 0, 7) === 'http://') {
            $domain = substr($domain, 7);
        }
        if (substr(strtolower($domain), 0, 4) === 'www.') {
            $domain = substr($domain, 4);
        }

        $domain = $this->get_whois_information($domain);

        if ($url) {
            $color = 'bg-danger'; //danger
            return view('frontend.calculate', [
                'url' => $url,
                'color' => $color,
                'domain' => (object) $domain,
            ]);
        }
        smilify('error', 'Please enter a valid URL with scheme (http / https)', 'Whooops');
        return back()->with('errors', 'Please enter a valid URL');
    }

    /**
     * get_whois_information - Get's the WHOIS information
     * from WHOIS Servers, and decodes it. To server response time, it
     * decodes that data into a JSON file.
     *
     *
     *  COMMAND TO CLEAR: php artisan clear:whois
     *  Clears all WHOIS entries in public/whois/*
     *
     * @param  string $domain
     *
     * @return void
     */
    public function get_whois_information($domain = '')
    {
        if ($domain === '') {
            throw new \Exception('Domain name must be provided');
        }

        // $whois_storage_path = 'public/whois/' . $domain . '.json';
        // if(Storage::disk('local')->exists($whois_storage_path)) {
        //     $data = json_decode(Storage::disk('local')->get($whois_storage_path), true);
        //     $data['source'] = 'from local storage, cached ' . \Carbon\Carbon::parse(Storage::lastModified($whois_storage_path))->diffForHumans();
        // } else {
        //     $data = PHPWhois::lookupDomain($domain);
        //     $data['source'] = 'from WHOIS server, just now';
        //     Storage::disk('local')->put($whois_storage_path, json_encode($data));
        // }

        $data = PHPWhois::lookupDomain($domain);
        $data['source'] = 'from WHOIS server, just now';

        return $data;
    }

    public function ping_domain($domain = '')
    {
        if ($domain === '') {
            throw new \Exception('Domain name must be provided');
        }

        $ping = new \JJG\Ping($domain);
        $ping->setTtl(128);
        $ping->setTimeout(10);

        $latency = $ping->ping();

        if ($latency !== false) {
            $response = [
                'code' => 200,
                'message' => 'Able to resolve host, ' . $latency . ' ms',
            ];
        } else {
            $response = [
                'code' => 404,
                'message' => 'Unable to resolve <a class="text-danger" href="' . $domain . '" target="_blank">' . $domain . '</a>',
            ];
        }

        return $response;
    }

    public function calculate()
    {

        // Data comes in as POST Request.

        $response = app(CO2Helper::class)->calculate(
            $age = request('age'),
            $country = request('country'),
            $server = request('server'),
            $server_type = request('server_type'),
            $traffic = request('traffic')
        );
        return response()->json($response);
    }
}
