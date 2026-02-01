<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Magpie IT</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    @include('frontend.include.style')
</head>

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center sticky-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">Magpie IT</h1>
        </a>

        @include('frontend.include.navber')

        <a class="btn-getstarted" href="#">Get Started</a>
    </div>
</header>

<main class="main">

  @yield('content')

</main>

<!-- ======= Footer ======= -->
@include('frontend.include.footer')
<!-- ======= End Footer ======= -->

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
@include('frontend.include.script')

</body>

</html>
