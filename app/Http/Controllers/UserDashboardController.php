<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userPayments = Payment::whereHas('taxpayer', function($query) use ($user) {
            $query->where('email', $user->email);
        })->get();

        $totalPaid = $userPayments->sum('amount');
        $paymentCount = $userPayments->count();

        return view('user.dashboard', compact('userPayments', 'totalPaid', 'paymentCount'));
    }

    public function createPayment()
    {
        $taxpayers = Tax::all();
        return view('user.payment_create', compact('taxpayers'));
    }

    public function storePayment(Request $request)
    {
        $request->validate([
            'taxpayer_id' => 'required|exists:taxes,id',
            'amount' => 'required|numeric|min:0.01',
            'payment_date' => 'required|date',
        ]);

        Payment::create($request->all());
        return redirect()->route('user.dashboard')->with('success', 'Payment recorded successfully!');
    }
}