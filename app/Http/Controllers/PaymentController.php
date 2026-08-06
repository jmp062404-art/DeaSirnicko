<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Tax;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('taxpayer')->orderByDesc('payment_date')->get();
        return view('admin.payment_index', compact('payments'));
    }

    public function create(Request $request)
    {
        $taxpayers = Tax::all();
        $selectedTaxpayerId = $request->get('taxpayer_id');
        return view('admin.payment_create', compact('taxpayers', 'selectedTaxpayerId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'taxpayer_id' => 'nullable|exists:taxes,id',
            'payer_name' => 'required_without:taxpayer_id|string',
            'business_name' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|string|in:gcash,debit_card,cash',
            'payment_date' => 'required|date',
        ]);

        $payment = Payment::create($request->only([
            'taxpayer_id','payer_name','business_name','amount','payment_method','payment_date'
        ]));

        if (auth()->check() && auth()->user()->role === 'user') {
            return redirect()->route('admin.payment.show', ['payment' => $payment->id, 'print' => 1])
                ->with('success', 'bayad ka na boi');
        }

        return redirect()->route('admin.payment.index')->with('success', 'Payment recorded successfully!');
    }

    public function show(Payment $payment)
    {
        $payment->load('taxpayer');
        return view('admin.payment_show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $taxpayers = Tax::all();
        return view('admin.payment_edit', compact('payment','taxpayers'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'taxpayer_id' => 'nullable|exists:taxes,id',
            'payer_name' => 'required_without:taxpayer_id|string',
            'business_name' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|string|in:gcash,debit_card,cash',
            'payment_date' => 'required|date',
        ]);

        $payment->update($request->only([
            'taxpayer_id','payer_name','business_name','amount','payment_method','payment_date'
        ]));

        return redirect()->route('admin.payment.index')->with('success','Payment updated.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payment.index')->with('success','Payment deleted.');
    }
}
