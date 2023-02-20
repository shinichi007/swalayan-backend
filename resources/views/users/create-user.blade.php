@extends('layouts.main')

@section('main')
    <main id="main-container">
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ URL('/users/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-12">
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-user-circle text-muted
                                me-1"></i>
                                    Tambah User
                                </h2>

                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                        {{ $error }} <br/>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="mb-4">
                                    <label class="form-label">Foto</label>
                                    <input class="form-control" type="file" name="profile_pic" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-name">Nama</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-name"
                                        name="name" placeholder="Masukan nama.." required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-email">Email</label>
                                    <input type="email" class="form-control" id="dm-profile-edit-email"
                                        name="email" placeholder="Masukan email.." required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-password">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password"
                                        name="password" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-password">
                                        Konfirmasi Password
                                    </label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password"
                                        name="password_confirmation" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-phone">
                                        No HP
                                    </label>
                                    <input type="text" class="form-control" id="dm-profile-edit-phone"
                                        name="phone" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-phone">
                                        Role
                                    </label>
                                    <select class="form-select" id="example-select" name="role" required>
                                    <option selected="">-- Pilih Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                </div>
                            </select>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 offset-lg-5">
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle opacity-50 me-1"></i>
                                        Tambah User
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
