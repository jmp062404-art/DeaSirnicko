@extends('layouts.admin')

@section('title', 'Payments - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-credit-card me-3"></i>Tax Payments
    </h1>
    <p class="page-subtitle">Track and manage all tax payments from taxpayers</p>
</div>

<!-- Action Buttons -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.payment.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>Record New Payment
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.report.index') }}" class="btn btn-info w-100">
                            <i class="fas fa-chart-pie me-2"></i>Dashboard
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.report.generate') }}" class="btn btn-success w-100">
                            <i class="fas fa-file-pdf me-2"></i>Generate Report
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.taxpayer.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-users me-2"></i>Taxpayers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Payments Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Payments List
            <span class="badge bg-primary ms-2">{{ $payments->count() }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        @if($payments->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag me-1"></i>ID</th>
                            <th><i class="fas fa-user me-1"></i>Taxpayer / Payer</th>
                            <th><i class="fas fa-briefcase me-1"></i>Business</th>
                            <th><i class="fas fa-money-bill me-1"></i>Amount</th>
                            <th><i class="fas fa-wallet me-1"></i>Method</th>
                            <th><i class="fas fa-calendar me-1"></i>Date</th>
                            <th><i class="fas fa-cogs me-1"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td><span class="badge bg-secondary">#{{ $payment->id }}</span></td>
                                <td>
                                    @if($payment->taxpayer)
                                        <strong>{{ $payment->taxpayer->name }}</strong><br>
                                        <small class="text-muted">{{ $payment->taxpayer->email }}</small>
                                    @else
                                        <strong>{{ $payment->payer_name ?? 'N/A' }}</strong>
                                    @endif
                                </td>
                                <td>{{ $payment->business_name ?? '—' }}</td>
                                <td>
                                    <span class="fw-bold text-success">₱{{ number_format($payment->amount, 2) }}</span>
                                </td>
                                <td>
                                    @if($payment->payment_method === 'gcash')
                                        <span class="badge bg-info"><i class="fab fa-google-pay me-1"></i>GCash</span>
                                    @elseif($payment->payment_method === 'debit_card')
                                        <span class="badge bg-primary"><i class="fas fa-credit-card me-1"></i>Debit</span>
                                    @else
                                        <span class="badge bg-secondary"><i class="fas fa-coins me-1"></i>Cash</span>
                                    @endif
                                </td>
                                <td>
                                    <i class="fas fa-calendar-alt me-1 text-muted"></i>
                                    {{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.payment.show', $payment->id) }}" 
                                           class="btn btn-info btn-sm" title="View Payment">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.payment.edit', $payment->id) }}" 
                                           class="btn btn-warning btn-sm" title="Edit Payment">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.payment.destroy', $payment->id) }}" 
                                              method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" 
                                                    title="Delete Payment" 
                                                    onclick="return confirm('Are you sure you want to delete this payment?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Summary Section -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card border-success">
                        <div class="card-body text-center">
                            <h5 class="text-success">
                                <i class="fas fa-chart-line me-2"></i>Total Payments
                            </h5>
                            <h3 class="text-success mb-0">₱{{ number_format($payments->sum('amount'), 2) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-info">
                        <div class="card-body text-center">
                            <h5 class="text-info">
                                <i class="fas fa-receipt me-2"></i>Payment Count
                            </h5>
                            <h3 class="text-info mb-0">{{ $payments->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-credit-card fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No Payments Found</h5>
                <p class="text-muted">Start by recording your first tax payment.</p>
                <a href="{{ route('admin.payment.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Record First Payment
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
