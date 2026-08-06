<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details - DeaDelaRoca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Payment Details</h1>
                <div class="mb-3">
                    <a href="{{ route('admin.payment.index') }}" class="btn btn-secondary">Back to Payments</a>
                    <a href="{{ route('report.index') }}" class="btn btn-info ms-2 no-print">Reports Dashboard</a>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h5>Payment Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Payment ID:</strong> {{ $payment->id }}</p>
                                <p><strong>Taxpayer / Payer:</strong>
                                    @if($payment->taxpayer)
                                        {{ $payment->taxpayer->name }}
                                    @else
                                        {{ $payment->payer_name ?? '—' }}
                                    @endif
                                </p>
                                <p><strong>Email:</strong> {{ $payment->taxpayer->email ?? '—' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Amount:</strong> ₱{{ number_format($payment->amount, 2) }}</p>
                                <p><strong>Payment Date:</strong> {{ \Carbon\Carbon::parse($payment->payment_date)->format('F d, Y') }}</p>
                                <p><strong>Recorded:</strong> {{ $payment->created_at->format('M d, Y g:i A') }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <p><strong>Taxpayer Address:</strong> {{ $payment->taxpayer->address ?? '—' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
  (function() {
    try {
      const params = new URLSearchParams(window.location.search);
      if (params.get('print') === '1') {
        window.print();
      }
    } catch (e) {
      // no-op
    }
  })();
</script>
