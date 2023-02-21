@extends('layouts.main')

@section('main')
    <main id="main-container">
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ URL('/change-password') }}" method="POST">
                        @csrf
                        @include('partials.notif')
                        <div class="row push">
                            <div class="col-lg-12">
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-user-circle text-muted
                                me-1"></i>
                                    Ubah Password
                                </h2>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-password">
                                        Password Saat Ini
                                    </label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password"
                                        name="old_password">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="dm-profile-edit-password-new">
                                            Password Baru
                                        </label>
                                        <input type="password" class="form-control" id="dm-profile-edit-password-new"
                                            name="password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="dm-profile-edit-password-new-confirm">
                                            Konfirmasi Password
                                        </label>
                                        <input type="password" class="form-control"
                                            id="dm-profile-edit-password-new-confirm"
                                            name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 offset-lg-5">
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle opacity-50 me-1"></i>
                                        Ubah Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
