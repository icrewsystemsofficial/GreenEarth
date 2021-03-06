<?php

namespace App\Http\Controllers;

use App\Helpers\Whois;
use App\Mail\SendContactMailtoAdmins;
use App\Mail\SendContactMailtoUser;
use App\Mail\SendTransactionDetailMail;

use App\Models\Announcement;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Cronfig\Sysinfo\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Razorpay\Api\Api;

use Session;
use Exception;

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


        if (Storage::disk('local')->exists($whois_storage_path)) {
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
        $system = new System();

        // System can get you the OS you are currently running
        $os = $system->getOs();
        // OS NAME = $os->getCurrentOsName()
        // Get some metrics like free disk space
        $freeSpace = $os->getCurrentMemoryUsage();

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

    public function calculate()
    {
        $url = request('website');
        $url = filter_var($url, FILTER_VALIDATE_URL);
        if ($url) {
            $color = 'bg-danger'; //danger
            $domain = $this->getDomainInformation($url);
            return view('frontend.calculate', [
                'url' => $url,
                'color' => $color,
                'domain' => $domain,
            ]);
        }
        smilify('error', 'Please enter a valid URL with scheme (http / https)', 'Whooops');
        return back()->with('errors', 'Please enter a valid URL');
    }

    public function comingsoon()
    {
        return view('frontend.comingsoon');
    }

    public function privacy_policy()
    {
        return view('frontend.legal.privacypolicy');
    }

    public function terms_of_service()
    {
        return view('frontend.legal.termsofservice');
    }

    public function aboutus()
    {
        return view('frontend.about');
    }

    public function partners()
    {
        return view('frontend.partners');
    }

    public function investors()
    {
        return view('frontend.comingsoon');
    }

    /*Contact Module*/

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contact_store(Request $request)
    {

        // $request->validate([
        //         'email' => 'required',
        //         'body' => 'required',
        //         'type' => 'required',
        //         'g-recaptcha-response' => 'recaptcha'
        // ]);


        $contact = new Contact();
        $contact->email = $request->email;
        $contact->type = $request->type;
        $contact->body = $request->body;
        $contact->status = 0; // Status: 0 = New, 1 = Contacted, 2 = Resolved, 3 = Spam.
        $contact->save();

        $this->contact_mailsend($contact);

        smilify('Yay', 'Your message was sent to us, we\'ll get in touch with you soon');
        return redirect(route('home.contact.index'));
    }

    public function contact_mailSend($data)
    {

        $email = $data->email;
        $type = $data->type;
        $body = $data->body;
        $data_for_id = Contact::where([['email', $email], ['type', $type], ['body', $body]])->first();

        $id = $data_for_id->id;
        $url = route('portal.admin.contact-requests.view', $id);


        //$admins_emailid = User::role('admin')->get('email');

        $mailInfo = [
            'title' => 'Greenearth - New message from a User',
            'email' => $email,
            'type' => $type,
            'body' => $body,
            'url' => $url,
            'id' => $id,
            'mails' => 'rishikataria@outlook.com' //$admins_emailid
        ];

        // foreach ($admins_emailid as $mail) {
        //     $emailid = $mail->email;
        //     Mail::to($emailid)->send(new SendContactMailtoAdmins($mailInfo));
        // }

        Mail::to($email)->send(new SendContactMailtoUser($mailInfo));

        return response()->json([
            'message' => 'Mail has sent.',
        ], Response::HTTP_OK);
    }

    public function contributors()
    {
        $github_api_url = 'https://api.github.com/repos/icrewsystemsofficial/GreenEarth';

        // STARS

        //Check if cache exists...
        $greenearth_stars = cache('greenearth_stars');
        //If cache does not exist, fetch from API.

        if ($greenearth_stars == null) {
            $stars = Http::get($github_api_url . '/stargazers')->json();
            $greenearth_stars = count($stars);
            cache(['greenearth_stars' => $greenearth_stars], now()->addHours(2));
            //Save the data as cache for the next 2 hours.
        }

        // COMMITS
        $first_commit_hash_for_the_repo = '431d5d8be1603a9f361f4d42d694826669612dc8'; //This has to be hard-coded.

        //Check if cache exists...
        $latest_commit_hash = cache('latest_commit_hash');

        //If cache does not exist, fetch from API.

        if ($latest_commit_hash == null) {
            $latest_commit = Http::get($github_api_url . '/git/refs/heads/master')->json();
            $latest_commit_hash = $latest_commit['object']['sha'];
            cache(['latest_commit_hash' => $latest_commit_hash], now()->addHour(1));
            //Save the data as cache for the next 2 hours.
        }

        $total_commits = cache('total_commits');
        //If cache does not exist, fetch from API.

        if ($total_commits == null) {
            $total_commits = Http::get($github_api_url . '/compare/' . $first_commit_hash_for_the_repo . '...' . $latest_commit_hash)->json();
            $total_commits = $total_commits['total_commits'] + 1;
            cache(['total_commits' => $total_commits], now()->addHour(1));
            //Save the data as cache for the next 2 hours.
        }

        $commits = cache('commits');

        if ($commits == null) {
            $commits = Http::get($github_api_url . '/compare/' . $first_commit_hash_for_the_repo . '...' . $latest_commit_hash)->json();
            cache(['commits' => $commits], now()->addHour(1));
        }

        // PULL REQUESTS

        return view('frontend.contributors', [
            'stars' => $greenearth_stars,
            'commits' => $total_commits,
            'commits_all' => array_reverse($commits['commits']),
        ]);
    }

    public function glossary()
    {
        return view('frontend.glossary');
    }

    public function volunteer($username)
    {
        return view('frontend.volunteer');
    }

    public function announcements()
    {
        $announcements = Announcement::where('status', "1")->orderBy('created_at', 'desc')->get();
        return view('frontend.announcement', compact('announcements'));
    }

    public function view($slug)
    {
        $announcements = Announcement::where('slug', $slug)->first();
        return view('frontend.view', compact('announcements'));
    }

    public function payment()
    {
        return view('frontend.payment');
    }

    public function submit(Request $request)
    {
        //dd($request);
        $payment = new Payment;
        $payment->name = $request->name;
        $payment->email = $request->email;
        $payment->contact_number = $request->phone;
        $payment->amount = $request->amount;
        $payment->status = 0;
        $payment->save();
        // "0" => PROCESSING
        // "1" => SUCCESS
        // "2" => FAILURE
        //$email = $request->email;
        //$amount = $request->amount;
        //$contact = $request->contact_number;

        return view('frontend.payment_2')
            ->with('email', $request->email)
            ->with('amount', $request->amount)
            ->with('contact', $request->contact_number);
    }

    public function pay(Request $request)
    {
        // $order  = $client->order->create([
        // 'receipt'         => 'order_rcptid_11',
        // 'amount'          => 50000, // amount in the smallest currency unit
        // 'currency'        => 'INR'// <a href="/docs/international-payments/#supported-currencies"  target="_blank">See the list of supported currencies</a>.)
        // ]);

        $input = $request->all();
        $api = new Api(config('app.RAZORPAY_API_KEY'), config('app.RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $paymentInfo = Payment::where('email', $payment['email'])->latest('updated_at')->first();
        // Payment::where('id', $paymentt['id'])->update(['razorpay_id'=>$payment['id']]);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount'], 'currency' => 'INR'));
                if ($response['status'] = 'captured') {
                    Payment::where('id', $paymentInfo['id'])->update(['razorpay_id' => $payment['id'], 'status' => 1]);
                }
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        $updatedPayment = Payment::where('id', $paymentInfo['id'])->first();
        $this->transaction_mailsend($updatedPayment);

        activity()->causedBy(Auth::user())->log('Payment Successfully completed');
        return redirect(route('home.index'));
    }
    // MISSIONS MUST BE ADDED FOR THE PAYMENTS DONE


    public function transaction_mailSend($data)
    {
        $transaction_id = $data->id;
        $email = $data->email;
        $name = $data->name;
        $amount = $data->amount;
        $date = Carbon::now()->isoFormat('DD/MM/YYYY');


        $temp = explode(' ', $created_at);

        $mailInfo = [
            'title' => 'Greenearth - New message from a User',
            'transaction_id' => $transaction_id,
            'email' => $email,
            'name' => $name,
            'amount' => $amount,
            'date' => $date,
        ];

        Mail::to($email)->send(new SendTransactionDetailMail($mailInfo));

        return response()->json([
            'message' => 'Mail has sent.'
        ], Response::HTTP_OK);
    }
}
