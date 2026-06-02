<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LawSync Admin</title>

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: #1f2937;
            color: white;
        }

        .sidebar h4 {
            padding: 20px;
            border-bottom: 1px solid #374151;
        }

        .sidebar a {
            color: #d1d5db;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #374151;
            color: #fff;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .card-box {
            border-radius: 12px;
            padding: 20px;
            color: white;
        }

        .bg-blue { background: #3b82f6; }
        .bg-green { background: #10b981; }
        .bg-yellow { background: #f59e0b; }
        .bg-red { background: #ef4444; }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4>⚖️ LawSync</h4>

    <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Users</a>
    <a href="{{ route('admin.lawyers') }}"><i class="bi bi-briefcase"></i> Lawyers</a>
    <a href="{{ route('admin.bookings') }}"><i class="bi bi-journal-check"></i> Appointments</a>

    <form method="POST" action="{{ route('logout') }}" class="p-3">
        @csrf
        <button class="btn btn-danger w-100">Logout</button>
    </form>
</div>

<!-- Content -->
<div class="content">

    <!-- Top Bar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Admin Panel</h4>
        <span>{{ auth()->user()->name }}</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>