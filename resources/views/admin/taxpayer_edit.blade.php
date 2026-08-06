@extends('layouts.admin')

@section('title', 'Edit Taxpayer - DeaDelaRoca')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-user-edit me-3"></i>Edit Taxpayer
    </h1>
    <p class="page-subtitle">Update taxpayer information</p>
</div>

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.taxpayer.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Back to Taxpayers
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.payment.create') }}?taxpayer_id={{ $taxpayer->id }}" class="btn btn-success w-100">
                            <i class="fas fa-credit-card me-2"></i>Record Payment
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.report.index') }}" class="btn btn-info w-100">
                            <i class="fas fa-chart-pie me-2"></i>Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-id-card me-2"></i>Taxpayer Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.taxpayer.update', $taxpayer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label"><i class="fas fa-user me-1"></i>Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $taxpayer->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="fas fa-envelope me-1"></i>Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $taxpayer->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <div class="invalid-feedback"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label"><i class="fas fa-map-marker-alt me-1"></i>Address</label>
                        <textarea id="address" name="address" rows="4" class="form-control @error('address') is-invalid @enderror" required>{{ old('address', $taxpayer->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary w-100"><i class="fas fa-save me-2"></i>Save Changes</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.taxpayer.index') }}" class="btn btn-outline-secondary w-100"><i class="fas fa-times me-2"></i>Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
