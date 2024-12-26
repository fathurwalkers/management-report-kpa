<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte3') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte3') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte3') }}/dist/css/adminlte.min.css">\
    <style>
        .login-page {
            background-image: url('{{ asset('assets/img/') }}/kpa2.jpg') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">
                    <img src="{{ asset('assets') }}/logo.png" alt="ECOASPHALT" class="brand-image my-2"
                        style="" width="200px">
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login ke Aplikasi Manajemen Laporan</p>

                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('post-login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="username" class="form-control" placeholder="Username" name="login_username"
                            autofocus oninput="this.value = this.value.toUpperCase()" maxlength="99">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="login_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">MASUK</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
                            <input type="hidden" id="hiddenInput" value="Dashboard" name="login_req">
                            <label for="toggleButton" class="mx-auto d-flex justify-content-center">
                                Klik untuk mengganti tujuan
                            </label>
                            <button type="button" id="toggleButton" class="btn btn-info btn-block">Management Report</button>
                        </div>
                    </div> --}}
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/adminlte3') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/adminlte3') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/adminlte3') }}/dist/js/adminlte.min.js"></script>
    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            // Mendapatkan elemen tombol dan input hidden
            var button = document.getElementById('toggleButton');
            var hiddenInput = document.getElementById('hiddenInput');

            // Cek nilai saat ini, kemudian toggle ke nilai lain
            if (button.innerText === "Management Report") {
                button.innerText = "Filing System";
                hiddenInput.value = "File";
            } else {
                button.innerText = "Management Report";
                hiddenInput.value = "Dashboard";
            }
        });
    </script>
</body>

</html>
