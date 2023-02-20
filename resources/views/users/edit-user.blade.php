@extends('layouts.main')

@section('main')
    <main id="main-container">
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ URL('/users/'.$user->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-12">
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-user-circle text-muted
                                me-1"></i>
                                    Edit User
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
                                    <div class="push">
                                        <img class="img-avatar" src="{{ Storage::url($user['avatar']) }}">
                                    </div>
                                    <label class="form-label" for="dm-profile-edit-avatar">
                                        Ubah Foto
                                    </label>
                                    <input class="form-control" type="file" id="dm-profile-edit-avatar" name="profile_pic">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-name">Nama</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-name"
                                        name="name" placeholder="Masukan nama.." value="{{ $user['name'] }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-email">Email</label>
                                    <input type="email" class="form-control" id="dm-profile-edit-email"
                                        name="email" placeholder="Masukan email.."
                                        value="{{ $user['email'] }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="dm-profile-edit-phone">
                                        No HP</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-phone"
                                        name="phone" value="{{ $user['phone'] }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 offset-lg-5">
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle opacity-50 me-1"></i>
                                        Ubah User
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
