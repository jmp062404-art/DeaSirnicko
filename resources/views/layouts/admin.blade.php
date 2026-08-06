<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DeaDelaRoca Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --info-color: #17a2b8;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-success: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: var(--gradient-primary) !important;
            box-shadow: var(--shadow);
            border: none;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 5px;
            margin: 0 5px;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .main-container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .page-header {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
            border-left: 5px solid var(--secondary-color);
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 2rem;
        }

        .btn {
            border-radius: 10px;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-primary {
            background: var(--gradient-primary);
        }

        .btn-success {
            background: var(--gradient-success);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            color: var(--dark-color);
        }

        .btn-info {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            color: var(--dark-color);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%);
            color: var(--dark-color);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: var(--dark-color);
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead th {
            background: var(--gradient-primary);
            color: white;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(52, 152, 219, 0.1);
            transform: scale(1.01);
        }

        .badge {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-weight: 600;
        }

        .alert {
            border: none;
            border-radius: 10px;
            border-left: 5px solid;
        }

        .alert-success {
            border-left-color: var(--success-color);
            background: rgba(39, 174, 96, 0.1);
        }

        .alert-danger {
            border-left-color: var(--danger-color);
            background: rgba(231, 76, 60, 0.1);
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border-top: 5px solid;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stats-card.primary {
            border-top-color: var(--secondary-color);
        }

        .stats-card.success {
            border-top-color: var(--success-color);
        }

        .stats-card.warning {
            border-top-color: var(--warning-color);
        }

        .stats-card.info {
            border-top-color: var(--info-color);
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: #6c757d;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer {
            background: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .main-container {
                margin-top: 1rem;
            }
            
            .page-header {
                padding: 1.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.report.index') }}">
                <i class="fas fa-building me-2"></i>DeaDelaRoca Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @if(Auth::user()?->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.report.index') }}">
                                <i class="fas fa-chart-pie me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.taxpayer.index') }}">
                                <i class="fas fa-users me-1"></i>Taxpayers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.permit.index') }}">
                                <i class="fas fa-file-alt me-1"></i>Permits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.payment.index') }}">
                                <i class="fas fa-credit-card me-1"></i>Payments
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.payment.create') }}">
                                <i class="fas fa-credit-card me-1"></i>Record Payment
                            </a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    @if(Auth::user()?->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.report.generate') }}">
                                <i class="fas fa-file-pdf me-1"></i>Generate Report
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i>{{ Auth::user()?->name ?? 'Admin' }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form id="admin-logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">
                <i class="fas fa-building me-2"></i>
                <strong>DeaDelaRoca Municipal System</strong> - 
                Administrative Panel
            </p>
            <small class="text-muted">© {{ date('Y') }} All rights reserved</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
