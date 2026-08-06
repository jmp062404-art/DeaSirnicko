@extends('layouts.admin')

@section('title', 'Taxpayers - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-users me-3"></i>Taxpayers Management
    </h1>
    <p class="page-subtitle">Manage taxpayer information and track their payment records</p>
</div>

<!-- Action Buttons -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.taxpayer.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-user-plus me-2"></i>Add New Taxpayer
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.payment.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-credit-card me-2"></i>Record Payment
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.report.index') }}" class="btn btn-info w-100">
                            <i class="fas fa-chart-pie me-2"></i>Dashboard
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.report.generate') }}" class="btn btn-warning w-100">
                            <i class="fas fa-file-pdf me-2"></i>Generate Report
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

<!-- Taxpayers Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Taxpayers List
            <span class="badge bg-primary ms-2">{{ $taxpayers->count() }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        @if($taxpayers->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag me-1"></i>ID</th>
                            <th><i class="fas fa-user me-1"></i>Name</th>
                            <th><i class="fas fa-map-marker-alt me-1"></i>Address</th>
                            <th><i class="fas fa-envelope me-1"></i>Email</th>
                            <th><i class="fas fa-cogs me-1"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taxpayers as $taxpayer)
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">#{{ $taxpayer->id }}</span>
                                </td>
                                <td>
                                    <strong>{{ $taxpayer->name }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($taxpayer->address, 30) }}</small>
                                </td>
                                <td>
                                    <a href="mailto:{{ $taxpayer->email }}" class="text-decoration-none">
                                        {{ $taxpayer->email }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.payment.create') }}?taxpayer_id={{ $taxpayer->id }}" 
                                           class="btn btn-success btn-sm" 
                                           title="Record Payment">
                                            <i class="fas fa-credit-card"></i>
                                        </a>
                                        <a href="{{ route('admin.taxpayer.edit', $taxpayer->id) }}" class="btn btn-info btn-sm" title="Edit Taxpayer">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.taxpayer.destroy', $taxpayer->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete Taxpayer" onclick="return confirm('Delete this taxpayer? This action cannot be undone.')">
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
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No Taxpayers Found</h5>
                <p class="text-muted">Start by adding your first taxpayer to the system.</p>
                <a href="{{ route('admin.taxpayer.create') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus me-2"></i>Add First Taxpayer
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
