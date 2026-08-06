@extends('layouts.user')

@section('title', 'Make Payment - DeaDelaRoca')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-credit-card me-3"></i>Make Tax Payment
    </h1>
    <p class="page-subtitle">Record your tax payment to the municipal system</p>
</div>

<!-- Navigation -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-2">
                        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-2">
                        <a href="#payment-form" class="btn btn-info w-100" onclick="document.getElementById('payment-form').scrollIntoView()">
                            <i class="fas fa-credit-card me-2"></i>Payment Form
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form -->
<div class="row justify-content-center" id="payment-form">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-credit-card me-2"></i>Payment Information
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('user.payment.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="taxpayer_id" class="form-label">
                                <i class="fas fa-user me-1"></i>Select Taxpayer
                            </label>
                            <select class="form-control @error('taxpayer_id') is-invalid @enderror" 
                                    id="taxpayer_id" name="taxpayer_id" required>
                                <option value="">Choose a taxpayer...</option>
                                @foreach($taxpayers as $taxpayer)
                                    <option value="{{ $taxpayer->id }}" {{ old('taxpayer_id') == $taxpayer->id ? 'selected' : '' }}>
                                        {{ $taxpayer->name }} - {{ $taxpayer->email }}
                                    </option>
                                @endforeach
                            </select>
                            @error('taxpayer_id')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="amount" class="form-label">
                                <i class="fas fa-money-bill me-1"></i>Payment Amount
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">₱</span>
                                <input type="number" step="0.01" min="0.01" 
                                       class="form-control @error('amount') is-invalid @enderror" 
                                       id="amount" name="amount" value="{{ old('amount') }}" 
                                       placeholder="Enter payment amount"
                                       required>
                            </div>
                            @error('amount')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="payment_date" class="form-label">
                                <i class="fas fa-calendar me-1"></i>Payment Date
                            </label>
                            <input type="date" class="form-control @error('payment_date') is-invalid @enderror" 
                                   id="payment_date" name="payment_date" value="{{ old('payment_date', date('Y-m-d')) }}" required>
                            @error('payment_date')
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
                                <i class="fas fa-save me-2"></i>Record Payment
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary w-100">
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
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Payment Guidelines
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Select the correct taxpayer information from the dropdown
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Enter the exact payment amount in Philippine Peso
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Ensure the payment date is accurate
                    </li>
                    <li class="mb-0">
                        <i class="fas fa-check text-success me-2"></i>
                        Payment will be recorded immediately upon submission
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
