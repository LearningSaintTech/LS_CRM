<?php

namespace App\Http\Controllers;
use App\Models\Vendor;

use App\Models\Websites;
use App\Models\Payment;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function paymentlist()
    {
        $vendor = Vendor::where('status', 1)->get();
        $website = Websites::where('status', 1)->get();
        $payment = Payment::get();
        // dd($payment);
        // dd($vendor ,$website);
        return view('payment.index', compact('vendor', 'website', 'payment'));

    }

    public function getwebsites(Request $request)
    {
        $websites = Websites::where('vendor_id', $request->vendor_id)->where('status', 1)
            ->select('id', 'sitename')
            ->get();
        // dd($websites);
        return response()->json($websites);
    }

    public function paymentinsert(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'vendor_id' => 'required|exists:vendors,id',
            'secret_key' => 'required|max:255',
            'key' => 'required|max:255',
            'website_id' => 'required|exists:websites,id',
        ]);

        if ($request->payment_id) {
            $payment = Payment::where('id', $request?->payment_id)->first();
        } else {
            $payment = new Payment();
        }
        $payment->name = $request?->name;
        $payment->status = $request?->status;
        $payment->vendor_id = $request?->vendor_id;
        $payment->website_id = $request?->website_id;
        $payment->secret_key = $request?->secret_key;
        $payment->key = $request?->key;
        $payment->save();
        if ($request?->payment_id) {
            return redirect()->back()->with('success', 'Payment update successfully!');
        } else {
            return redirect()->back()->with('success', 'Payment added successfully!');
        }
    }

    public function paymentedit($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json([
            'id' => $payment->id,
            'name' => $payment->name,
            'vendor_id' => $payment->vendor_id,
            'website_id' => $payment->website_id,
            'status' => $payment->status,
            'key' => $payment->key,
            'secret_key' => $payment->secret_key,
        ]);
    }

}
