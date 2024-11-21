<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barokah Net</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('auth/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('img/logoh.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo" style="text-align: center;">
                                <img src="{{ asset('img/logoh.png') }}" alt="Logo"
                                    style="max-width: 100%; height: auto;">
                            </div>

                            @yield('content')



                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('auth/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('auth/js/off-canvas.js') }}"></script>
    <script src="{{ asset('auth/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('auth/js/misc.js') }}"></script>
    <!-- endinject -->
    <script>
        document.getElementById('btnSubmit').addEventListener('click', function() {
            this.disabled = true; // Disable tombol setelah klik
            this.form.submit(); // Kirim form
        });
    </script>

    @yield('script')
</body>

</html>
