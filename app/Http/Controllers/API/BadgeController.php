<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\Directory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BadgeController extends Controller
{

    public function sendSessionDetails($business_id)
    {
        $response = array();

        if ($business_id == '') {
            $response['code'] = 400;
            $response['message'] = 'API is empty';
        } else {
//            check business id is valid
            $business = Directory::where('business_id', '=', $business_id);

            if (!$business) {
                $response['code'] = 400;
                $response['message'] = 'API key is invalid';
            } else {
//      get client type mobile/tablet/desktop
                $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
                $isMob = is_numeric(strpos($ua, "mobile"));
                $isTab = is_numeric(strpos($ua, "tablet"));
                $isDes = !$isMob && !$isTab;

                $clientType = '';
                if ($isMob) {
                    $clientType = 'mobile';
                } elseif ($isTab) {
                    $clientType = 'tablet';
                } elseif ($isDes) {
                    $clientType = 'desktop';
                }


                $clientIp = $_SERVER['REMOTE_ADDR'];

                $locationApi = Http::get('http://www.geoplugin.net/json.gp?ip=' . $clientIp)->json();

                if ($locationApi == null) {
                    $location = 'Localhost';
                } else {
//                $location = $locationApi['geoplugin_regionName'];
                    $location = $locationApi['geoplugin_countryName'];
                }

                $time = new \DateTime('now');

                $badge = Badge::create([
                    'business_id' => $business_id,
                    'client_type' => $clientType,
                    'client_time' => $time,
                    'ip' => $clientIp,
                    'country' => $location
                ]);
            }

        }

        return response()->json($response);
    }
}
