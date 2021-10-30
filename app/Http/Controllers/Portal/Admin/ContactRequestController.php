<?php

namespace App\Http\Controllers\portal\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_requests = Contact::all();
        return view('pages.contacts.index', compact('contact_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        return('hi');
    }
 */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact_requests = contact::find($id);
        return view('pages.contacts.detail', compact('contact_requests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($id === '') {
            throw new \Exception('ID must be provided to update user records');
        }

        $contact = Contact::find($id);

        $contact->status = request('status');

        $contact->save();

        //Logging the activity.
        activity()
        ->causedBy(Auth::user())
        ->log('Contact-Request ID: ' .$request->input('id') . ' status was updated');
        smilify('success', 'ID: '.$request->input('id') .' was updated', 'Yay!');
        return redirect(route('portal.admin.contact-requests.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
}
