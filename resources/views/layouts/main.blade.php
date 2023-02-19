<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>JM Swalayan - {{ $title }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    @yield('custom_css')
</head>

<body>
    <div id="page-container"
        class="sidebar-o enable-page-overlay side-scroll page-header-fixed main-content-narrow side-trans-enabled page-header-dark">
        <aside id="side-overlay">
            <div class="bg-image" style="background-image: url('assets/media/various/bg_side_overlay_header.jpg');">
                <div class="bg-primary-op">
                    <div class="content-header">
                        <div class="ms-2">
                            <a class="text-white fw-semibold" href="#">Pengaturan</a>
                        </div>
                        <a class="ms-auto text-white" href="javascript:void(0)" data-toggle="layout"
                            data-action="side_overlay_close">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-side">
                <div class="block block-transparent pull-x pull-t mb-0">
                    <div class="block-content tab-content overflow-hidden">
                        <div class="tab-pane pull-x fade fade-up show active" id="so-settings" role="tabpanel"
                            aria-labelledby="so-settings-tab" tabindex="0">
                            <form action="{{ url('/setting') }}" method="PUT" onsubmit="return false;">
                                <div class="block mb-0">
                                    <div class="block-content block-content-sm block-content-full bg-body">
                                        <span class="text-uppercase fs-sm fw-bold">App</span>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="mb-4">
                                            <label class="form-label">Versi Aplikasi</label>
                                            <input type="text" readonly class="form-control" value="1.0.0-beta">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">URL Aplikasi</label>
                                            <input type="text" class="form-control"
                                                value="https://wijayacode.net/projects/com.wijayacode.swalayan">
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full border-top">
                                        <button type="submit" class="btn w-100 btn-alt-primary">
                                            <i class="fa fa-fw fa-save me-1 opacity-50"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <nav id="sidebar" aria-label="Main Navigation">

            <div class="bg-header-dark">
                <div class="content-header bg-white-5">
                    <a class="fw-semibold text-white tracking-wide " href="/dashboard">
                        <span class="smini-visible">
                            JM
                        </span>
                        <span class="smini-hidden">
                            JM <span class="opacity-75">Swalayan</span>
                        </span>
                    </a>
                    <div bis_skin_checked="1">
                        <button type="button" class="btn btn-sm btn-alt-secondary js-class-toggle-enabled"
                            data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa"
                            onclick="Dashmix.layout('dark_mode_toggle');">
                            <i class="fa-moon fa" id="dark-mode-toggler"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                            <i class="fa fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="js-sidebar-scroll">
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ $title === 'Beranda' ? 'active' : '' }}" href="/dashboard">
                                <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                <span class="nav-main-link-name">Beranda</span>
                                <span
                                    class="nav-main-link-badge badge rounded-pill bg-primary">{{ $countPending }}</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ $title === 'Customer' || $title === 'Detail Customer' || $title === 'Edit Customer' ? 'active' : '' }}"
                                href="/customers">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Customer</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ $title === 'Daftar User' || $title === 'Tambah User' ? 'active' : '' }}"
                                href="/users">
                                <i class="nav-main-link-icon fa fa-user-tie"></i>
                                <span class="nav-main-link-name">User</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ $title === 'Log' }}"
                                href="/logs">
                                <i class="nav-main-link-icon fa fa-gears"></i>
                                <span class="nav-main-link-name">Log</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header id="page-header">
            <div class="content-header">
                <div class="space-x-1">
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>

                <div class="space-x-1">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">
                                {{ Auth::user()->name }}
                            </span>
                            <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                                Opsi
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="/profile">
                                    <i class="far fa-fw fa-user me-1"></i>
                                    Profil
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout"
                                    data-action="side_overlay_toggle">
                                    <i class="far fa-fw fa-building me-1"></i>
                                    Pengaturan
                                </a>
                                <a class="dropdown-item" href="/">
                                    <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="page-header-loader" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('main')

        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                        Crafted by <a class="fw-semibold" href="https://wijayacode.net" target="_blank">WijayaCode
                            Indonesia</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://jmswalayan.com" target="_blank">JM Swalayan</a> &copy;
                        <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        Dashmix.helpersOnLoad(['jq-magnific-popup', 'jq-select2']);
    </script>
    @yield('custom_js')
</body>

</html>
