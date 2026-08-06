@extends('layouts.admin')

@section('title', 'Reports Dashboard - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-chart-pie me-3"></i>Reports Dashboard
    </h1>
    <p class="page-subtitle">Comprehensive overview of municipal system statistics and quick access to all features</p>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card primary">
            <div class="stats-number text-primary">{{ $totalTaxpayers }}</div>
            <div class="stats-label">Total Taxpayers</div>
            <hr class="my-3">
                            <a href="{{ route('admin.taxpayer.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye me-1"></i>View All
                            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card success">
            <div class="stats-number text-success">{{ $totalPermits }}</div>
            <div class="stats-label">Total Permits</div>
            <hr class="my-3">
                            <a href="{{ route('admin.permit.index') }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-eye me-1"></i>View All
                            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card info">
            <div class="stats-number text-info">₱{{ number_format($totalPayments, 2) }}</div>
            <div class="stats-label">Total Payments</div>
            <hr class="my-3">
                            <a href="{{ route('admin.payment.index') }}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-eye me-1"></i>View All
                            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card warning">
            <div class="stats-number text-warning">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stats-label">System Status</div>
            <hr class="my-3">
                            <a href="{{ route('admin.report.generate') }}" class="btn btn-outline-warning btn-sm">
                                <i class="fas fa-file-pdf me-1"></i>Generate Report
                            </a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.taxpayer.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-user-plus me-2"></i>Add New Taxpayer
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.permit.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-file-plus me-2"></i>Add New Permit
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.payment.create') }}" class="btn btn-warning w-100">
                            <i class="fas fa-credit-card me-2"></i>Record Payment
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('admin.report.generate') }}" class="btn btn-info w-100">
                            <i class="fas fa-file-pdf me-2"></i>Generate Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- System Overview -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>System Overview
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-primary">
                            <i class="fas fa-users me-2"></i>Taxpayer Management
                        </h6>
                        <p class="text-muted">Manage taxpayer information, track payments, and maintain comprehensive records.</p>
                        <a href="{{ route('admin.taxpayer.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-arrow-right me-1"></i>Manage Taxpayers
                        </a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">
                            <i class="fas fa-file-alt me-2"></i>Permit Management
                        </h6>
                        <p class="text-muted">Handle business permits, track status, and maintain compliance records.</p>
                        <a href="{{ route('admin.permit.index') }}" class="btn btn-outline-success btn-sm">
                            <i class="fas fa-arrow-right me-1"></i>Manage Permits
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-warning">
                            <i class="fas fa-credit-card me-2"></i>Payment Processing
                        </h6>
                        <p class="text-muted">Record tax payments, track revenue, and generate payment reports.</p>
                        <a href="{{ route('admin.payment.index') }}" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-arrow-right me-1"></i>View Payments
                        </a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-info">
                            <i class="fas fa-chart-bar me-2"></i>Reports & Analytics
                        </h6>
                        <p class="text-muted">Generate comprehensive reports, view statistics, and analyze system data.</p>
                        <a href="{{ route('admin.report.generate') }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-arrow-right me-1"></i>View Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
