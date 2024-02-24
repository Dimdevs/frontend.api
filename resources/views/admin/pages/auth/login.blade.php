<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ========== Page Title ========== -->
    <title>Silancar - Admin - Login</title>

    <!-- Favicons -->
    <link href="{{ asset('template/base-admin/dist/assets/figma-assets/dimdevs-logo.png') }}" rel="icon" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/base-website/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/base-website/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/css/nav.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/css/auth.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/base-website/assets/css/auth-responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
</head>

<body class="auth-body overflow-hidden">
    @include('sweetalert::alert')

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row no-gutter">

            <!-- The content half -->
            <div class="col-md-6" style="background-color: #fff;">
                <div class="auth-content d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-9 mx-auto">
                                <div class="auth-title text-center">
                                    <img src="{{ asset('template/base-admin/dist/assets/figma-assets/LOGO.png') }}" width="200" class="bg-primary rounded p-3" alt="">
                                    <h3>Selamat Datang</h3>
                                    <p>Silahkan masuk PT. Maxxima Innovative Engineering</p>
                                </div>
                                <form class="auth-form" action="{{ route('admin.login.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" />
                                        @error('email')
                                        <p class="text-danger fw-bold mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="password">Kata Sandi</label>
                                        <div style="position: relative;">
                                            <i onclick="togglePassword('password', 'eye-icon-password')"
                                                id="eye-icon-password" class="bi bi-eye-fill"
                                                style="color: #9D9D9D; position: absolute; top: 54%; transform: translateY(-50%); right: 20px; cursor: pointer;"></i>
                                            <input type="password" name="password" id="password" class="form-control" name="password"
                                                placeholder="Masukkan kata sandi" />
                                        </div>
                                        @error('password')
                                        <p class="text-danger fw-bold mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input id="remember" type="checkbox" name="remeber_me" class="custom-control-input">
                                            <label for="remember" class="text-remember custom-control-label mx-2">Ingat Saya</label>
                                        </div>
                                        {{-- <a href="{{ route('forgotApplicant') }}">Lupa Kata Sandi?</a> --}}
                                    </div>
                                    <button type="submit" class="btn btn-block mb-3 confirm-btn">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>

        </div>
    </div>

    <!-- General JS Scripts -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/base-website/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('template/base-website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/base-website/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/base-website/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/base-website/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/base-website/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template/base-website/assets/js/main.js') }}"></script>

    <script>
        // FIlter Input Capitalize and numeric, send value as numeric and capitalize too
        function capitalizeInput(input) {
            input.value = input.value.toUpperCase();
        }

        function validateNumericInput(input) {
            input.value = input.value.replace(/\D/g, '');
        }

        function validateDecimalInput(input) {
            input.value = input.value.replace(/[^\d.]/g, '');
        }

        document.querySelectorAll('.capitalize').forEach(function(input) {
            input.addEventListener('input', function() {
                capitalizeInput(this);
            });
        });

        document.querySelectorAll('.numeric').forEach(function(input) {
            input.addEventListener('input', function() {
                validateNumericInput(this);
            });
        });

        document.querySelectorAll('.decimal').forEach(function(input) {
            input.addEventListener('input', function() {
                validateDecimalInput(this);
            });
        });
        // End filter function

         // Eye for password
        function togglePassword(inputId, eyeIconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(eyeIconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye-fill');
                eyeIcon.classList.add('bi-eye-slash-fill');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash-fill');
                eyeIcon.classList.add('bi-eye-fill');
            }
        }
        // End Eye Function

        // Rotate chevron down
        document.addEventListener('DOMContentLoaded', function () {
            var rotateButton = document.getElementById('rotateButton');
            var svgIcon = rotateButton.querySelector('svg');
            var dropdownMenu = document.querySelector('.dropdown-menu');

            rotateButton.addEventListener('click', function () {
                svgIcon.classList.toggle('rotate-180');

                // Check if the dropdown menu is visible
                var isDropdownVisible = dropdownMenu.classList.contains('show');

                // Rotate the SVG based on dropdown visibility
                if (isDropdownVisible) {
                    svgIcon.style.transform = 'rotate(180deg)';
                } else {
                    svgIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Listen for the dropdown visibility change event
            dropdownMenu.addEventListener('show.bs.dropdown', function () {
                svgIcon.style.transform = 'rotate(180deg)';
            });

            dropdownMenu.addEventListener('hide.bs.dropdown', function () {
                svgIcon.style.transform = 'rotate(0deg)';
            });
        });
    </script>

</body>

</html>
