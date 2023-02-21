@extends('layouts.no-auth-main')

@section('main')
    <div class="row g-0 justify-content-center bg-black-75">
        <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
            <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                <div
                    class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                    <div class="mb-2 text-center">
                        <a class="link-fx fw-bold fs-1" href="/">
                            <span class="text-dark">JM </span><span class="text-primary">Swalayan</span>
                        </a>
                        <p class="text-uppercase fw-bold fs-sm text-muted">Reset Password</p>
                    </div>

                    <form class="js-validation-reminder" action="{{ URL('/forgot-password')}}" method="POST">
                        @csrf

                        @include('partials.notif')

                        <div class="mb-4">
                            <div class="input-group input-group-lg">
                                <input type="email" class="form-control" id="reminder-credential"
                                    name="email" placeholder="Email" required>
                                <span class="input-group-text">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
                            <div class="fw-semibold fs-sm py-1">
                                Punya akun? <a href="{{ URL('/') }}">Login</a>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-hero btn-primary">
                                <i class="fa fa-fw fa-reply opacity-50 me-1"></i>
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>
@endsection
