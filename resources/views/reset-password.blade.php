<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>JM Swalayan - Login</title>
    <link rel="shortcut icon" href="/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/media/favicons/favicon-192x192.png">

    <link rel="stylesheet" id="css-main" href="/assets/css/dashmix.min.css">

  </head>
  <body>
    <div id="page-container">

        <main id="main-container">
            <div class="bg-image" style="background-image: url('/assets/media/photos/bg-login.png');">
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

                                <form class="js-validation-reminder" action="{{ URL('/reset-password/'.$token)}}" method="POST">
                                    @csrf
                                    @include('partials.notif')
                                    <div class="mb-4">
                                        <div class="input-group input-group-lg">
                                            <input type="password" class="form-control" id="reminder-credential"
                                                name="password" placeholder="Password" required>
                                            <span class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="input-group input-group-lg">
                                            <input type="password" class="form-control"
                                            id="dm-profile-edit-password-new-confirm"
                                            placeholder="Password Confirmation"
                                            name="password_confirmation" required>
                                            <span class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="otp" value="{{ $otp }}">
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
            </div>
        </main>
    </div>


    <script src="/assets/js/dashmix.app.min.js"></script>

    <script src="/assets/js/lib/jquery.min.js"></script>

    <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <script src="/assets/js/pages/op_auth_signin.min.js"></script>
  </body>

</html>
