<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIPus</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- CSS APP --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="d-flex">

    <div id="content" class="flex-grow-1">

        {{-- NAVBAR --}}
        <nav class="navbar navbar-light bg-light shadow-sm px-3">
            <button class="btn btn-outline-secondary me-3"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar">
                <i class="bi bi-list"></i>
            </button>

            <span class="navbar-brand">SIPus – Manajemen Perpustakaan</span>

            {{-- LOGOUT --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </nav>

        <main class="p-4">
            @yield('content')
        </main>
    </div>
</div>

{{-- SIDEBAR --}}
<div class="offcanvas offcanvas-start bg-dark text-white" id="sidebar">
    <div class="offcanvas-header">
        <h5>SIPus</h5>
        <button class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('books.index') }}" class="nav-link text-white">📘 Buku</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link text-white">📂 Kategori</a>
            </li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
