<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payment - DeaDelaRoca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Edit Payment</h1>
            <div class="mb-3">
                <a href="{{ route('admin.payment.index') }}" class="btn btn-secondary">Back to Payments</a>
                <a href="{{ route('admin.report.index') }}" class="btn btn-info ms-2">Reports Dashboard</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.payment.update', $payment->id) }}" method="POST" class="card p-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="taxpayer_id" class="form-label">Select Taxpayer (optional)</label>
                    <select id="taxpayer_id" name="taxpayer_id" class="form-select">
                        <option value="">-- none --</option>
                        @foreach($taxpayers as $t)
                            <option value="{{ $t->id }}" {{ old('taxpayer_id', $payment->taxpayer_id) == $t->id ? 'selected' : '' }}>
                                {{ $t->name }} - {{ $t->email }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">If taxpayer selected, payer name will be optional.</small>
                </div>

                <div class="mb-3">
                    <label for="payer_name" class="form-label">Payer Name</label>
                    <input type="text" id="payer_name" name="payer_name" value="{{ old('payer_name', $payment->payer_name) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="business_name" class="form-label">Business Name</label>
                    <input type="text" id="business_name" name="business_name" value="{{ old('business_name', $payment->business_name) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="number" step="0.01" min="0.01" id="amount" name="amount" value="{{ old('amount', $payment->amount) }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select id="payment_method" name="payment_method" class="form-select" required>
                        <option value="gcash" {{ old('payment_method', $payment->payment_method) == 'gcash' ? 'selected' : '' }}>Gcash</option>
                        <option value="debit_card" {{ old('payment_method', $payment->payment_method) == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                        <option value="cash" {{ old('payment_method', $payment->payment_method) == 'cash' ? 'selected' : '' }}>Cash</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="payment_date" class="form-label">Payment Date</label>
                    <input type="date" id="payment_date" name="payment_date" value="{{ old('payment_date', \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d')) }}" class="form-control" required>
                </div>

                <button class="btn btn-primary">Update Payment</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
