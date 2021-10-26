<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_home()
    {
        $faqs = FAQ::where('status', '1')->orderBy('updated_at')->get();
        return view('pages.faq.faq_frontend', compact('faqs'));
    }

    public function index_portal()
    {
        $faqs = FAQ::where('status', '1')->orderBy('updated_at')->get();
        return view('pages.faq.index_portal', compact('faqs'));
    }

    /**
     * index_portal_admin - Show the admin FAQ dashboard.
     *
     * @return void
     */
    public function index_portal_admin()
    {
        $faqs = FAQ::orderBy('updated_at')->get();
        return view('pages.faq.index_admin', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->title = $request->title;
        $faq->body = $request->body;
        $faq->created_by = $request->created_by;
        if ($request->status === null) {
            $faq->status = 1;
        } else {
            $faq->status = 0;
        }
        $faq->save();
        smilify('success', 'FAQ Created successfully');
        activity()
        ->causedBy(Auth::user())
        ->log('FAQ ID: ' .$faq->id . ' was created');
        smilify('success', 'ID: '.$request->input('id') .' was updated', 'Yay!');
        return redirect()->route('portal.admin.faq.index');
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
        $faq = FAQ::find($id);
        $slug = Str::slug($faq->title, '-');
        return redirect()->route('portal.faq.detail', $slug);
    }

    public function detail($id)
    {
        $title = ucwords(str_replace('-', ' ', $id));
        $faq = FAQ::where('title', 'like', '%' . $title . '%')->get();
        $faq = $faq[0];
        return view('pages.faq.detail', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $faq = FAQ::find($id);
        return view('pages.faq.edit', compact('faq'));
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
        $faq = FAQ::find($id);
        $faq->title = $request->title;
        $faq->body = $request->body;
        if (! empty($request->status)) {
            $faq->status = 1;
        } else {
            $faq->status = 0;
        }
        $faq->save();
        activity()
        ->causedBy(Auth::user())
        ->log('FAQ ID: ' .$id . ' status was updated');
        smilify('success', 'ID: '.$request->input('id') .' was updated', 'Yay!');
        smilify('success', 'FAQ updated successfully');
        return redirect(route('portal.admin.faq.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();
        activity()
        ->causedBy(Auth::user())
        ->log('FAQ ID: ' .$id . ' was deleted');
        smilify('success', 'FAQ deleted successfully');
        return redirect(route('portal.admin.faq.index'));
    }
}
