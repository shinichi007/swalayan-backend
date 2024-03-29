@extends('layouts.main')

@section('main')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
            <div class="block-content">
                <div class="py-5 text-center">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ Storage::url($customer->user['avatar']) == '/storage/' ? 'https://st3.depositphotos.com/6672868/13701/v/600/depositphotos_137014128-stock-illustration-user-profile-icon.jpg' : Storage::url($customer->user['avatar']) }}">
                    <h1 class="fw-bold my-2 text-primary-dark">Ubah Data Pelanggan</h1>
                    <h2 class="h4 fw-bold text-primary-dark">
                        {{ $customer->user['name'] }}
                    </h2>
                    <a class="btn btn-secondary" href="{{ URL('/customer/'.$customer['id']) }}">
                        <i class="fa fa-fw fa-arrow-left opacity-50"></i>
                        Kembali
                    </a>
                </div>
                <form action="{{ URL('/customer/'.$customer['id'].'/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i>
                        Profil Customer
                    </h2>

                    @include('partials.notif')

                    <div class="row push">
                        <div class="col-lg-4">
                        <p class="text-muted">
                            Demi menjaga privasi dan kenyamanan customer, maka akses edit customer terbatas,
                            admin maupun oprator hanya bisa mengubah nama dan point member.
                        </p>
                        <p class="text-muted">
                            Selain itu proses edit data customer dapat dilakukan oleh masing masing customer via aplikasi mereka.
                        </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-name">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan nama.." value="{{ $customer->user['name'] }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukan email.." value="{{ $customer->user['email'] }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-job-title">No HP</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukan Nomor HP.." value="{{ $customer->user['phone'] }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="dm-profile-edit-company">Poin Member</label>
                            <input type="number" class="form-control" name="point" value="{{ $customer['point'] }}" {{ $customer['status'] == 'member' ? '' : 'disabled' }}>
                        </div>
                        </div>
                    </div>

                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Update Customer
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

@section('custom_js')
<script src="{{ asset('assets/js/pages/edit_customer_dialog.min.js') }}"></script>
@endsection
