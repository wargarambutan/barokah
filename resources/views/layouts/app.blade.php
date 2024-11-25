<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Barokah Net')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logov.png') }}" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">


    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}" />
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .full-page {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* Tinggi minimum sesuai tinggi layar */
            background-color: #f8f9fa;
            /* Warna latar belakang opsional */
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <!-- Topbar Start -->
    <div class="container-fluid topbar bg-light px-5">
        <div class="row gx-0 align-items-center">
            <!-- Kanan atas: Tombol login, tampil di semua ukuran layar -->
            <div class="col-12 text-end d-flex justify-content-end">
                <div class="d-inline-flex align-items-center ms-auto">
                    <a href="{{ route('login') }}" class="d-block text-dark">
                        <small class="me-3 text-dark">
                            <i class="fa fa-sign-in-alt text-primary me-2"></i>Login
                        </small>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <!-- Topbar End -->

    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{ route('index') }}" class="navbar-brand p-0">
                <img src="{{ asset('img/logov.png') }}" alt="Logo"
                    style="height: 300px !important; width: auto !important;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('index') }}" class="nav-item nav-link">Beranda</a>
                    <a href="{{ route('index') }}" class="nav-item nav-link">Tentang</a>
                    <a href="{{ route('ajukan-keluhan') }}" class="nav-item nav-link">Open Tickets</a>
                    <a href="#" class="nav-item nav-link">Cek Tagihan</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">Daftar</span>
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('pendaftaran-pelanggan') }}" class="dropdown-item">Pelanggan</a>
                            <a href="{{ route('pendaftaran-karyawan') }}" class="dropdown-item">Karyawan</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @yield('carousel')
    </div>
    <!-- Navbar & Hero End -->

    @yield('content')



    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Cek jika elemen dengan ID 'homepage' ada di halaman
            if ($("#homepage").length) {
                // Jalankan script scroll untuk halaman pertama
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 45) {
                        $(".navbar").addClass("sticky-top shadow-sm");
                    } else {
                        $(".navbar").removeClass("sticky-top shadow-sm");
                    }
                });
            } else {
                // Jika ID 'homepage' tidak ada, langsung tambahkan kelas tanpa scroll
                $(".navbar").addClass("sticky-top shadow-sm");
            }
        });
    </script>
    <script>
        document.getElementById('btnSubmit').addEventListener('click', function() {
            this.disabled = true; // Disable tombol setelah klik
            this.form.submit(); // Kirim form
        });
    </script>

    @yield('scripts')

</body>

</html>
