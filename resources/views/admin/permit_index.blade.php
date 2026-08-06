@extends('layouts.admin')

@section('title', 'Permits - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-file-alt me-3"></i>Permits Management
    </h1>
    <p class="page-subtitle">Manage business permits and track their status</p>
</div>

<!-- Action Buttons -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.permit.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-file-plus me-2"></i>Add New Permit
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.report.index') }}" class="btn btn-info w-100">
                            <i class="fas fa-chart-pie me-2"></i>Dashboard
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.payment.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-credit-card me-2"></i>Record Payment
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

<!-- Permits Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Permits List
            <span class="badge bg-primary ms-2">{{ $permits->count() }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        @if($permits->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag me-1"></i>ID</th>
                            <th><i class="fas fa-building me-1"></i>Business Name</th>
                            <th><i class="fas fa-user me-1"></i>Owner</th>
                            <th><i class="fas fa-flag me-1"></i>Status</th>
                            <th><i class="fas fa-cogs me-1"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permits as $permit)
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">#{{ $permit->id }}</span>
                                </td>
                                <td>
                                    <strong>{{ $permit->business_name }}</strong>
                                </td>
                                <td>{{ $permit->owner }}</td>
                                <td>
                                    <span class="badge bg-{{ $permit->status === 'active' ? 'success' : ($permit->status === 'pending' ? 'warning' : 'danger') }}">
                                        <i class="fas fa-{{ $permit->status === 'active' ? 'check' : ($permit->status === 'pending' ? 'clock' : 'times') }} me-1"></i>
                                        {{ ucfirst($permit->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.permit.edit', $permit->id) }}" class="btn btn-info btn-sm" title="Edit Permit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.permit.destroy', $permit->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete Permit" onclick="return confirm('Delete this permit?')">
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
                <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No Permits Found</h5>
                <p class="text-muted">Start by adding your first business permit to the system.</p>
                <a href="{{ route('admin.permit.create') }}" class="btn btn-primary">
                    <i class="fas fa-file-plus me-2"></i>Add First Permit
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
