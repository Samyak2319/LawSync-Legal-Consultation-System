<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'LawSync')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#f5f7fa; }
        .hero { background: linear-gradient(135deg,#0d6efd,#0a58ca); color:white; padding:80px 0; }
        .card { border:none; border-radius:12px; transition:.3s; }
        .card:hover { transform:translateY(-5px); box-shadow:0 10px 25px rgba(0,0,0,0.1); }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

@include('partials.header')

<div class="container mt-3 flex-grow-1">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</div>

<main class="flex-grow-1">
    @yield('content')
</main>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>