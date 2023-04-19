<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Laundry Revolution </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav-laundry.png') }}">

    <!-- Bootstrap css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="/assets/js/head.js"></script>

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-6">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="text-center m-auto">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('assets/images/logo-laundry.png') }}" alt=""
                                                height="100">
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('assets/images/logo-laundry.png') }}" alt=""
                                                height="100">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                    panel.</p>
                            </div>
                            @php
                                $q = DB::table('users')->select(DB::raw('MAX(RIGHT(no_member,4)) as kode'));
                                $kd = '';
                                if ($q->count() > 0) {
                                    foreach ($q->get() as $k) {
                                        $tmp = ((int) $k->kode) + 1;
                                        $kd = sprintf('%04s', $tmp);
                                    }
                                } else {
                                    $kd = '0001';
                                }
                            @endphp
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                    <input type="hidden" readonly value="{{ 'LD-' . $kd }}" name="no_member"
                                        class="form-control" id="no" required />
                                    <input id="fullname" type="text"
                                        class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                        value="{{ old('email') }}" required placeholder="Masukan nama lengkap anda"
                                        autocomplete="fullname">

                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_whatsapp" class="form-label">No. WhatsApp</label>
                                    <input id="no_whatsapp" type="number"
                                        class="form-control @error('no_whatsapp') is-invalid @enderror"
                                        name="no_whatsapp" value="{{ old('no_whatsapp') }}" required
                                        placeholder="Masukan nomor whatsapp anda" autocomplete="no_whatsapp">
                                    @error('no_whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email</label>
                                    <input id="emailaddress" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required placeholder="Masukan email anda"
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota Asal</label>
                                    <input id="kota" type="text"
                                        class="form-control @error('kota') is-invalid @enderror" name="kota"
                                        value="{{ old('kota') }}" required placeholder="Masukan kota asal anda"
                                        autocomplete="kota">

                                    @error('kota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kota_ws" class="form-label">Kota Workshop</label>
                                    <input id="kota_ws" type="text"
                                        class="form-control @error('kota_ws') is-invalid @enderror" name="kota_ws"
                                        value="{{ old('kota_ws') }}" required
                                        placeholder="Masukan kota saat mengikuti workshop" autocomplete="kota_ws">

                                    @error('kota_ws')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="usaha" class="form-label">Bidang usaha</label>
                                    <input id="usaha" type="text"
                                        class="form-control @error('usaha') is-invalid @enderror" name="usaha"
                                        value="{{ old('usaha') }}" required
                                        placeholder="Bidang usaha yang sedang ditekuni" autocomplete="usaha">

                                    @error('usaha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="password"
                                            placeholder="Masukan password anda">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password-confirm" type="password"
                                            class="form-control @error('password-confirm') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="new-password-confirm"
                                            placeholder="Masukan ulang password anda">

                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Sign Up </button>
                                </div>

                            </form>







                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="auth-recoverpw.html" class="text-white-50 ms-1">Forgot your password?</a></p>
                            <p class="text-white-50">You have an account? <a href="{{ route('login') }}"
                                    class="text-white ms-1"><b>Sign In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        2015 -
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; Laundry Revolution by <a href="" class="text-white-50">OcidDev</a>
    </footer>

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>

</body>

</html>












{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
