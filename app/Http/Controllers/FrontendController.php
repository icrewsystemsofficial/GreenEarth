<?php

namespace App\Http\Controllers;

use Goutte\Client;
use App\Helpers\Whois;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Cronfig\Sysinfo\System;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }


    /**
     * calculateCarbon - Calcaulate carbon for a website
     *
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
     *
     * @param  mixed $url
     * @return void
     */
    private function getDomainInformation($url)
    {

        $my_url = parse_url($url);
        $host = $my_url['host'];
        $myHost = ucfirst($host);

        $whois_storage_path = 'public/whois/' . $host . '.json';


        if(Storage::disk('local')->exists($whois_storage_path)) {
            $carbondata = json_decode(Storage::disk('local')->get($whois_storage_path), true);

            //TODO Write a job worker to clear files older than 48 hours.
        } else {
            $whois = new Whois;
            $site = $whois->cleanUrl($host);
            $whois_data = $whois->whoislookup($site);
            $getHostIP = gethostbyname($host);
            $data_list = Whois::host_info($host);
            $whoisData = $whois_data[0];
            $domainAge = $whois_data[1];
            $createdDate = $whois_data[2];
            $updatedDate = $whois_data[3];
            $expiredDate = $whois_data[4];

            $carbondata = array();
            $carbondata['domain_age'] = $domainAge;
            $carbondata['domain_created'] = $createdDate;
            $carbondata['domain_updated'] = $updatedDate;
            $carbondata['domain_expired'] = $expiredDate;
            $carbondata['domain_ip'] = $data_list[0];
            $carbondata['domain_country'] = $data_list[1];
            $carbondata['domain_isp'] = $data_list[2];
            $carbondata['whois'] = $whois_data[0];
            Storage::disk('local')->put($whois_storage_path, json_encode($carbondata));
        }



        return $carbondata;
    }

    public function otherMethods()
    {
        $system = new System;

        // System can get you the OS you are currently running
        $os = $system->getOs();
        // OS NAME = $os->getCurrentOsName()
        dd($os->getCurrentMemoryUsage());
        // Get some metrics like free disk space
        $freeSpace = $os->getCurrentMemoryUsage();

        dd($this->calculateCarbon($url));

        // $res = Http::post('https://check-host.net/ip-info/whois', [
        //     'host' => 'icrewsystems.com',
        //     // 'output_format' => 'json',
        // ]);

        // dd($res->body());

        // $apikey = 'a4880f98a92ce578i094a6b828e05791f';
        // $client = new Client();
        // $crawler = $client->request('GET', 'https://check-host.net/ip-info?host=https://icrewsystems.com');
        // // $link = $crawler->selectLink('Retrive whois data')->link();
        // $link = $crawler->filter('#whois_retrieve')->link();
        // $crawler = $client->click($link);
        // dd($crawler->filter('#whois_result'));
        // // $crawler = $crawler->filter('#whois_result');

        // // Get the latest post in this category and display the titles
        // $crawler->filter('#whois_result')->each(function ($node) {
        // print $node->text()."\n";
        // dd($node->text());
        // });

        // dd('test');
    }

    public function calculate() {
        $url = request('website');
        $url = filter_var($url, FILTER_VALIDATE_URL);
        if($url) {
            $color = 'bg-danger'; //danger
            $domain = $this->getDomainInformation($url);
            return view('frontend.calculate', [
                'url' => $url,
                'color' => $color,
                'domain' => $domain,
            ]);
        } else {
            smilify('error', 'Please enter a valid URL with scheme (http / https)', 'Whooops');
            return back()->with('errors', 'Please enter a valid URL');
        }
    }

    public function comingsoon()
    {
        return view('frontend.comingsoon');
    }

    public function privacy_policy() {
        return view('frontend.legal.privacypolicy');
    }

    public function terms_of_service() {
        return view('frontend.legal.termsofservice');
    }

    public function aboutus(){
        return view('frontend.about');
    }

    public function partners(){
        return view('frontend.partners');
    }

    public function investors(){
        return view('frontend.comingsoon');
    }

    public function contributors(){
        $github_api_url = 'https://api.github.com/repos/icrewsystemsofficial/GreenEarth';

        // STARS

        //Check if cache exists...
        $greenearth_stars = cache('greenearth_stars');
        //If cache does not exist, fetch from API.
        if($greenearth_stars == null) {
            $stars = Http::get($github_api_url.'/stargazers')->json();
            $greenearth_stars = count($stars);
            cache(['greenearth_stars' => $greenearth_stars], now()->addHours(2));
            //Save the data as cache for the next 2 hours.
        }

        // COMMITS
        $first_commit_hash_for_the_repo = '431d5d8be1603a9f361f4d42d694826669612dc8'; //This has to be hard-coded.

        //Check if cache exists...
        $latest_commit_hash = cache('latest_commit_hash');

        //If cache does not exist, fetch from API.
        if($latest_commit_hash == null) {
            $latest_commit = Http::get($github_api_url.'/git/refs/heads/master')->json();
            $latest_commit_hash = $latest_commit['object']['sha'];
            cache(['latest_commit_hash' => $latest_commit_hash], now()->addHour(1));
            //Save the data as cache for the next 2 hours.
        }

        $total_commits = cache('total_commits');
        //If cache does not exist, fetch from API.
        if($total_commits == null) {
            $total_commits = Http::get($github_api_url.'/compare/'.$first_commit_hash_for_the_repo.'...'.$latest_commit_hash)->json();
            $total_commits = $total_commits['total_commits'] + 1;
            cache(['total_commits' => $total_commits], now()->addHour(1));
            //Save the data as cache for the next 2 hours.
        }

        $commits = cache('commits');
        if($commits == null) {
            $commits = Http::get($github_api_url.'/compare/'.$first_commit_hash_for_the_repo.'...'.$latest_commit_hash)->json();
            cache(['commits' => $commits], now()->addHour(1));
        }

        // PULL REQUESTS

        return view('frontend.contributors', [
            'stars' => $greenearth_stars,
            'commits' => $total_commits,
            'commits_all' => array_reverse($commits['commits']),
        ]);

    }

    public function glossary(){
        return view('frontend.glossary');
    }

    public function volunteer($username){
        return view('frontend.volunteer');
    }

}
