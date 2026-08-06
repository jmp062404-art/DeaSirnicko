@extends('layouts.admin')

@section('title', 'Create Taxpayer - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-user-plus me-3"></i>Create New Taxpayer
    </h1>
    <p class="page-subtitle">Add a new taxpayer to the municipal system</p>
</div>

<!-- Navigation -->
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

<!-- Form -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user-edit me-2"></i>Taxpayer Information
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.taxpayer.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-1"></i>Full Name
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Enter taxpayer's full name"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-1"></i>Email Address
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="Enter taxpayer's email address"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="address" class="form-label">
                                <i class="fas fa-map-marker-alt me-1"></i>Address
                            </label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" 
                                      name="address" 
                                      rows="4" 
                                      placeholder="Enter taxpayer's complete address"
                                      required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save me-2"></i>Create Taxpayer
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.taxpayer.index') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Information Card -->
<div class="row justify-content-center mt-4">
    <div class="col-lg-8">
        <div class="card border-info">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Important Information
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        All fields are required for taxpayer registration
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Email address will be used for official communications
                    </li>
                    <li class="mb-0">
                        <i class="fas fa-check text-success me-2"></i>
                        Taxpayer will be assigned a unique ID upon creation
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
