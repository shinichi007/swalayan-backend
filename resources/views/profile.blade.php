@extends('layouts.main')

@section('main')
    <main id="main-container">
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="">
                        <div class="row push">
                            <div class="col-lg-6">
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-user-circle text-muted
                                me-1"></i>
                                    Profil
                                </h2>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-name">Nama</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-name"
                                        name="dm-profile-edit-name" placeholder="Masukan nama.." value="Muhidin">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-email">Email</label>
                                    <input type="email" class="form-control" id="dm-profile-edit-email"
                                        name="dm-profile-edit-email" placeholder="Masukan email.."
                                        value="muhidin@gmail.com">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-phone">No
                                        HP</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-phone"
                                        name="dm-profile-edit-phone" value="085156565729">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Foto</label>
                                    <div class="push">
                                        <img class="img-avatar" src="assets/media/avatars/avatar.jpg" alt="">
                                    </div>
                                    <label class="form-label" for="dm-profile-edit-avatar">Ubah
                                        Foto</label>
                                    <input class="form-control" type="file" id="dm-profile-edit-avatar">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-user-circle text-muted
                                me-1"></i>
                                    Ubah
                                    Password
                                </h2>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-password">Password Saat Ini</label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password"
                                        name="dm-profile-edit-password">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="dm-profile-edit-password-new">Password Baru</label>
                                        <input type="password" class="form-control" id="dm-profile-edit-password-new"
                                            name="dm-profile-edit-password-new">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="dm-profile-edit-password-new-confirm">Konfirmasi
                                            Password</label>
                                        <input type="password" class="form-control"
                                            id="dm-profile-edit-password-new-confirm"
                                            name="dm-profile-edit-password-new-confirm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 offset-lg-5">
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary"><i class="fa fa-check-circle opacity-50 me-1"></i> Update Profil</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
