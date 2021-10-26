<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->get()->all();
        return view('pages.payments.index')
            ->with('payments', $payments);
    }

    public function manage($id)
    {
        $payments = Payment::where('id', $id)->get()->first();
        return view('pages.payments.manage')
            ->with('id', $id)
            ->with('comment', $payments->admin_remarks);
    }

    public function update($id, Request $request)
    {
        $payment = Payment::where('id', $id)->get()->first();
        $payment->admin_remarks = $request->description;
        $payment->save();
        return redirect(route('portal.admin.payments.index'));
    }
}
