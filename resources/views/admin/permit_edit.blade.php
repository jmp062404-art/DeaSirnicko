@extends('layouts.admin')

@section('title', 'Edit Permit - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-file-signature me-3"></i>Edit Permit
    </h1>
    <p class="page-subtitle">Update business permit details</p>
</div>

<!-- Navigation -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="{{ route('admin.permit.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Back to Permits
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

<!-- Form -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-file-contract me-2"></i>Permit Information
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.permit.update', $permit->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="business_name" class="form-label fw-bold">
                            <i class="fas fa-building me-2 text-primary"></i>Business Name
                        </label>
                        <input type="text"
                               class="form-control form-control-lg @error('business_name') is-invalid @enderror"
                               id="business_name"
                               name="business_name"
                               value="{{ old('business_name', $permit->business_name) }}"
                               placeholder="Enter the business name"
                               required>
                        @error('business_name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="owner" class="form-label fw-bold">
                            <i class="fas fa-user-tie me-2 text-primary"></i>Owner Name
                        </label>
                        <input type="text"
                               class="form-control form-control-lg @error('owner') is-invalid @enderror"
                               id="owner"
                               name="owner"
                               value="{{ old('owner', $permit->owner) }}"
                               placeholder="Enter the owner's name"
                               required>
                        @error('owner')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label fw-bold">
                            <i class="fas fa-check-circle me-2 text-primary"></i>Permit Status
                        </label>
                        <select class="form-select form-select-lg @error('status') is-invalid @enderror"
                                id="status"
                                name="status"
                                required>
                            <option value="">Choose a status...</option>
                            <option value="active" {{ old('status', $permit->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="pending" {{ old('status', $permit->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="expired" {{ old('status', $permit->status) === 'expired' ? 'selected' : '' }}>Expired</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('admin.permit.index') }}" class="btn btn-outline-secondary btn-lg w-100">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
