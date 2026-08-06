<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\Permit;
use App\Models\Payment;

class ReportController extends Controller
{
    public function index()
    {
        $totalTaxpayers = Tax::count();
        $totalPermits = Permit::count();
        $totalPayments = Payment::sum('amount');

        return view('admin.report', compact('totalTaxpayers', 'totalPermits', 'totalPayments'));
    }

    public function generate()
    {
        // Get all data for the report
        $taxpayers = Tax::with('payments')->get();
        $permits = Permit::all();
        $payments = Payment::with('taxpayer')->get();
        
        // Calculate statistics
        $totalTaxpayers = $taxpayers->count();
        $totalPermits = $permits->count();
        $totalPayments = $payments->sum('amount');
        $totalPaymentCount = $payments->count();
        
        // Calculate average payment
        $averagePayment = $totalPaymentCount > 0 ? $totalPayments / $totalPaymentCount : 0;
        
        // Get recent payments (last 10)
        $recentPayments = $payments->sortByDesc('payment_date')->take(10);
        
        // Get payment statistics by month
        $monthlyPayments = $payments->groupBy(function($payment) {
            return \Carbon\Carbon::parse($payment->payment_date)->format('Y-m');
        })->map(function($group) {
            return $group->sum('amount');
        });

        return view('admin.report_generate', compact(
            'taxpayers', 
            'permits', 
            'payments', 
            'totalTaxpayers', 
            'totalPermits', 
            'totalPayments', 
            'totalPaymentCount',
            'averagePayment',
            'recentPayments',
            'monthlyPayments'
        ));
    }
}
