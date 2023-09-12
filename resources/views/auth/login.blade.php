@extends('layout.master2')
@section('title' ,  __('Login to your acount') )
@section('content')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
    <div class="page-content d-flex align-items-center justify-content-center">
        <!-- Include Toastr library -->


        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pe-md-0">
                            <div class="auth-side-wrapper"
                                style="background-image: url({{ url(asset('assets/images/login.png')) }})">
                            </div>
                        </div>
                        <div class="col-md-8 ps-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2"> <img
                                        src="{{ asset('assets/images/logo.png') }}" alt="">
                                </a>
                                <h5 class="text-muted fw-normal mb-4">{{ __('Welcome back! Log in to your account.') }}</h5>

                                <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email address') }}</label>
                                        <input id="email" type="email" class="form-control email" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="{{ __('Email') }}">


                                        <span class="invalid-email"  role="alert">
                                            <strong></strong>
                                        </span>

                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control password"
                                            placeholder="{{ __('Password') }}" name="password" required
                                            autocomplete="current-password">

                                        <span class="invalid-password"  style="display: none;" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="authCheck">
                                            {{ __('Remember me') }}
                                        </label>
                                    </div>
                                    <div>
                                        <button type="submit" id="loginsubmit"
                                            class="btn btn-primary submit-btn me-2 mb-2 mb-md-0">{{ __('Login') }}</button>
                                        <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                            <i class="btn-icon-prepend" data-feather="twitter"></i>
                                            {{ __('Login with twitter') }}
                                        </button>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="d-block mt-3 text-muted" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
 
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('js/ajax/auth.js') }}"></script>
@endpush