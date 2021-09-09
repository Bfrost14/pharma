
<link href="{{ asset("vendor/mdi-font/css/material-design-iconic-font.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("vendor/font-awesome-4.7/css/font-awesome.min.css") }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset("vendor/select2/select2.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("vendor/datepicker/daterangepicker.css") }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset("css/main.css") }}" rel="stylesheet" media="all">
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">{{ __('Login') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-row">
                            <div class="name">{{ __('E-Mail Address') }}</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5 @error('email') is-invalid @enderror" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <div class="form-row">
                            <div class="name">{{ __('Password') }}</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                </div>
                            </div>
                        </div>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <div>
                            <button class="btn btn--radius-2 btn--green" type="submit">{{ __('Login') }}</button>
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
         <!-- Jquery JS-->
         <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
         <!-- Vendor JS-->
         <script src="{{ asset("vendor/select2/select2.min.js") }}"></script>
         <script src="{{ asset("vendor/datepicker/moment.min.js") }}"></script>
         <script src="{{ asset("vendor/datepicker/daterangepicker.js") }}"></script>

         <!-- Main JS-->
         <script src="{{ asset("js/global.js") }}"></script>

