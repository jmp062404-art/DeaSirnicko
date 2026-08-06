<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Report - DeaDelaRoca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            .container { max-width: none !important; }
        }
        .report-header {
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            border-left: 4px solid #007bff;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Report Header -->
        <div class="report-header">
            <div class="row">
                <div class="col-8">
                    <h1>DeaDelaRoca Municipal Report</h1>
                    <h4>Comprehensive System Report</h4>
                    <p class="text-muted">Generated on: {{ \Carbon\Carbon::now()->format('F d, Y g:i A') }}</p>
                </div>
                <div class="col-4 text-end no-print">
                    <a href="{{ route('report.index') }}" class="btn btn-secondary">Back to Dashboard</a>
                    <button onclick="window.print()" class="btn btn-primary">Print Report</button>
                </div>
            </div>
        </div>

        <!-- Summary Statistics -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h3 class="text-primary">{{ $totalTaxpayers }}</h3>
                        <p class="mb-0">Total Taxpayers</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h3 class="text-success">{{ $totalPermits }}</h3>
                        <p class="mb-0">Total Permits</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h3 class="text-info">₱{{ number_format($totalPayments, 2) }}</h3>
                        <p class="mb-0">Total Payments</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body text-center">
                        <h3 class="text-warning">₱{{ number_format($averagePayment, 2) }}</h3>
                        <p class="mb-0">Average Payment</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Sections -->
        <div class="row">
            <!-- Taxpayers Section -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Taxpayers List</h5>
                    </div>
                    <div class="card-body">
                        @if($taxpayers->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Payments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($taxpayers as $taxpayer)
                                            <tr>
                                                <td>{{ $taxpayer->id }}</td>
                                                <td>{{ $taxpayer->name }}</td>
                                                <td>{{ $taxpayer->email }}</td>
                                                <td>{{ $taxpayer->payments->count() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No taxpayers found.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Permits Section -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Permits List</h5>
                    </div>
                    <div class="card-body">
                        @if($permits->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Business</th>
                                            <th>Owner</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permits as $permit)
                                            <tr>
                                                <td>{{ $permit->id }}</td>
                                                <td>{{ $permit->business_name }}</td>
                                                <td>{{ $permit->owner }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $permit->status === 'active' ? 'success' : ($permit->status === 'pending' ? 'warning' : 'danger') }}">
                                                        {{ ucfirst($permit->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No permits found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments Section -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Recent Payments</h5>
                    </div>
                    <div class="card-body">
                        @if($recentPayments->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Taxpayer</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentPayments as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td>
                                                <td>{{ $payment->taxpayer->name }}</td>
                                                <td>₱{{ number_format($payment->amount, 2) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No payments found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Payments Chart -->
        @if($monthlyPayments->count() > 0)
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Monthly Payment Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Total Amount</th>
                                        <th>Progress Bar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($monthlyPayments->sortKeys() as $month => $amount)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($month)->format('F Y') }}</td>
                                            <td>₱{{ number_format($amount, 2) }}</td>
                                            <td>
                                                @php
                                                    $maxAmount = $monthlyPayments->max();
                                                    $percentage = $maxAmount > 0 ? ($amount / $maxAmount) * 100 : 0;
                                                @endphp
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar" role="progressbar" 
                                                         style="width: {{ $percentage }}%" 
                                                         aria-valuenow="{{ $percentage }}" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        {{ number_format($percentage, 1) }}%
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Report Footer -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-0">
                            <strong>Tax Municipal System</strong><br>
                            Report generated on {{ \Carbon\Carbon::now()->format('F d, Y \a\t g:i A') }}<br>
                            Total Records: {{ $totalTaxpayers + $totalPermits + $totalPaymentCount }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
