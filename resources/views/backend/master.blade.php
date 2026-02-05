<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Dashdark X — Demo Dashboard</title>

    <!-- Fonts + Bootstrap + Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    @include('backend.include.style')
</head>

<body>

    <!-- Mobile Sidebar Toggle Button -->
    <button class="mobile-sidebar-toggle">
        <span></span><span></span><span></span>
    </button>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Sidebar -->
    @include('backend.include.sidebar')

    <!-- Main -->
    <main class="main">
        <!-- Navbar -->
        @include('backend.include.navber')
      @yield('content')
        <footer class="footer mt-5">
            <div class="text-center py-3 muted">&copy; 2025 Magpie IT. All rights reserved.</div>
        </footer>
    </main>

    @include('backend.include.script')
</body>

</html>
