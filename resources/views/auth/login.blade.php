<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Log In | Laundry Revolution</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/fav-laundry.png') }}">

		<!-- Bootstrap css -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
		<!-- icons -->
		<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- Head js -->
		<script src="assets/js/head.js"></script>

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-6">
                        <div class="card bg-pattern">
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('assets/images/logo-laundry.png') }}" alt="" height="100">
                                            </span>
                                        </a>
                                        <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('assets/images/logo-laundry.png') }}" alt="" height="100">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    {{-- Bawaan --}}
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-1">
                                        <label for="email" class="col-form-label ">{{ __('Email Or email') }}
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email or email " autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="row mb-1">
                                        <label for="password" class="col-form-label ">{{ __('Password') }}
                                            <div class="input-group input-group-merge">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter your password" autocomplete="current-password">
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>

                                </form>
                                <div class="text-center mt-3">
                                    <p> <a href="{{ route('password.request') }}">Forgot your password?</a></p>
                                    <p>Don't have an account? <a href="{{ route('register') }}" class="ms-1"><b>Sign
                                                Up</b></a></p>
                                </div>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy; Laundry Revolution by <a href="" class="text-white-50">OcidDev</a>
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>
</html>





{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}
