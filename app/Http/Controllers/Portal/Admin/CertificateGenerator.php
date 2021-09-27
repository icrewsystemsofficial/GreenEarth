<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use App\Http\Requests\StoreCertificateRequest;
use App\Jobs\SendAcknowledgementMailJob;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Barryvdh\DomPDF\Facade as PDF;

class CertificateGenerator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $certificates = Certificate::all();

        if (file_exists(public_path('storage' . DIRECTORY_SEPARATOR . 'certificates'))) {

            $certificates = File::files(public_path('storage' . DIRECTORY_SEPARATOR . 'certificates'));
        }

        // return view('', compact('users', 'certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sentvia_options = config('app.sent_via');

        $user = User::where('id', $request->id)
            ->first();

        //return view('', compact('user', 'sentvia_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateRequest $request)
    {
        $certificate = Certificate::create($request->validated() + [
            'id' => Str::uuid(),
            'pdf_file_name' => 'certificate_' . Str::snake($request->name) . '_' . date('d_m_Y_H_i_A'),
        ]);

        if ($request->send_email) {
            SendAcknowledgementMailJob::dispatch($certificate);
        }

        $this->generatePDF($certificate['id']);

        activity()->log(Auth::user()->name . ' created a new salary slip for  ' . $certificate->business_id);

        //return redirect()->route('receipts.index');
    }

    public function generatePDF($id)
    {
        $certificate = Certificate::where('id', $id)->first();

        $file_name = $certificate->pdf_file_name;

        $markdown = new Markdown(view(), config('mail.markdown'));

        $html = $markdown->render('emails.certificate_pdf', ['certificate' => $certificate]);

        $file_path = public_path($file_name . '.html');

        if (!file_exists($file_path)) {
            Storage::disk('public')->put($file_name . '.html', $html);
        }

        // Create the directory
        Storage::disk('public')->makeDirectory('certificates' . DIRECTORY_SEPARATOR . date('Y') . DIRECTORY_SEPARATOR . date('M'));

        // Load the content and save the pdf in laravel local storage for downloading all the pdf generated for the month as a zip file
        return PDF::loadFile(public_path('storage' . DIRECTORY_SEPARATOR . $file_name . '.html'))
            ->save(public_path('storage' . '/' . 'receipts' . DIRECTORY_SEPARATOR . date('Y') . DIRECTORY_SEPARATOR . date('M') . DIRECTORY_SEPARATOR . $file_name . '.pdf'))
            ->setPaper('a4', 'portrait')
            ->stream($file_name . '.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
