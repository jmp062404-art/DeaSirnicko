@extends('layouts.user')

@section('title', 'User Dashboard - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-home me-3"></i>Welcome, {{ Auth::user()->name }}!
    </h1>
    <p class="page-subtitle">Manage your tax payments and view your payment history</p>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="stats-card success">
            <div class="stats-number text-success">₱{{ number_format($totalPaid, 2) }}</div>
            <div class="stats-label">Total Paid</div>
            <hr class="my-3">
            <small class="text-muted">All your tax payments</small>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="stats-card info">
            <div class="stats-number text-info">{{ $paymentCount }}</div>
            <div class="stats-label">Payment Count</div>
            <hr class="my-3">
            <small class="text-muted">Number of payments made</small>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="stats-card primary">
            <div class="stats-number text-primary">
                <i class="fas fa-credit-card"></i>
            </div>
            <div class="stats-label">Quick Pay</div>
            <hr class="my-3">
            <a href="{{ route('user.payment.create') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-plus me-1"></i>Pay Now
            </a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-3">
                        <a href="{{ route('user.payment.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-credit-card me-2"></i>Make Tax Payment
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-3">
                        <a href="#payment-history" class="btn btn-info w-100" onclick="document.getElementById('payment-history').scrollIntoView()">
                            <i class="fas fa-history me-2"></i>View Payment History
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment History -->
<div class="row" id="payment-history">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-history me-2"></i>Payment History
                    <span class="badge bg-primary ms-2">{{ $userPayments->count() }} Payments</span>
                </h5>
            </div>
            <div class="card-body">
                @if($userPayments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag me-1"></i>Payment ID</th>
                                    <th><i class="fas fa-money-bill me-1"></i>Amount</th>
                                    <th><i class="fas fa-calendar me-1"></i>Payment Date</th>
                                    <th><i class="fas fa-clock me-1"></i>Recorded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userPayments->sortByDesc('payment_date') as $payment)
                                    <tr>
                                        <td>
                                            <span class="badge bg-secondary">#{{ $payment->id }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-success">₱{{ number_format($payment->amount, 2) }}</span>
                                        </td>
                                        <td>
                                            <i class="fas fa-calendar-alt me-1 text-muted"></i>
                                            {{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $payment->created_at->format('M d, Y g:i A') }}
                                            </small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-credit-card fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No Payments Found</h5>
                        <p class="text-muted">You haven't made any tax payments yet.</p>
                        <a href="{{ route('user.payment.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Make Your First Payment
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Information Card -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-info">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Important Information
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-primary">
                            <i class="fas fa-credit-card me-2"></i>Payment Process
                        </h6>
                        <p class="text-muted">Select your taxpayer information and enter the payment amount to record your tax payment.</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">
                            <i class="fas fa-shield-alt me-2"></i>Secure & Reliable
                        </h6>
                        <p class="text-muted">All payments are securely recorded and tracked in the municipal system.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
