@extends('layouts.main')

@section('main')
    <main id="main-container">
        <div class="content">
            <div class="row items-push">
                <div class="col-6">
                    <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                        href="{{ URL('/customer/edit/'.$customer['id']) }}">
                        <div class="block-content py-5">
                            <div class="fs-3 fw-semibold mb-1">
                                <i class="fa fa-pencil-alt"></i>
                            </div>
                            <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                                Edit Customer
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a class="js-swal-confirm block block-rounded block-link-shadow text-center h-100 mb-0"
                        href="{{ URL('/customer/'.$customer['id'].'/delete') }}">
                        <div class="block-content py-5">
                            <div class="fs-3 fw-semibold text-danger mb-1">
                                <i class="fa fa-times"></i>
                            </div>
                            <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                                Hapus Customer
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="block block-rounded">
                <div class="block-content text-center">
                    <div class="py-4">
                        <div class="mb-3">
                            <img class="img-avatar img-avatar96" src="{{ Storage::url($customer->user['avatar']) }}" alt="">
                        </div>
                        <h1 class="fs-lg mb-0">
                            {{ $customer->user['name'] }}
                        </h1>
                        @if ($customer['status'] == 'member')
                            <p class="text-muted">
                                <i class="fa fa-award text-warning me-1"></i>
                                Member
                            </p>
                            <p class="text-muted">ID : {{ $customer['code'] ? $customer['code'] : '' }}</p>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#modal-block-slideup">Lihat Data Identitas</button>
                        @elseif ($customer['status'] == 'pending')
                            <p class="text-muted">
                                Pending
                            </p>
                            <a class="btn btn-danger" href="{{ URL('/customer/'.$customer['id'].'/verification') }}">
                                Verifikasi Identitas
                            </a>
                        @else
                            <p class="text-muted">
                                Reguler
                            </p>
                        @endif
                    </div>
                </div>
                @include('partials.notif')
                <div class="block-content bg-body-light text-center">
                    <div class="row items-push">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                {{ $error }} <br/>
                                @endforeach
                            </div>
                        @endif
                        <div class="col-6 col-md-3">
                            <div class="fw-semibold text-dark mb-1">Email</div>
                            <a class="link-fx" href="javascript:void(0)">{{ $customer->user['email'] }}</a>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="fw-semibold text-dark mb-1">No HP</div>
                            <a class="link-fx" href="javascript:void(0)">{{ $customer->user['phone'] }}</a>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="fw-semibold text-dark mb-1">Gender</div>
                            <a class="link-fx" href="javascript:void(0)">
                                {{ ($customer->user['gender'] == 'm') ? 'Laki-Laki' : 'Perempuan' }}
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="fw-semibold text-dark mb-1">Poin</div>
                            <a class="link-fx" href="javascript:void(0)">{{ $customer['point'] }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Alamat ({{ count($customer->user->addresses) }})</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        @foreach ($customer->user->addresses as $address)
                            <div class="col-lg-4">
                                <div class="block block-rounded block-bordered">
                                    <div class="block-header border-bottom">
                                        <h3 class="block-title">{{ $address['type'] }}
                                            {{ $address['default'] === true ? '(Utama)' : '' }}</h3>
                                    </div>
                                    <div class="block-content">
                                        <div class="fs-4 mb-1">{{ $address['name'] }}</div>
                                        <address class="fs-sm">
                                            {{ $address['address'] }}<br>
                                            {{ $address['city'] }}<br>
                                            {{ $address['zipcode'] }}<br><br>
                                            <i class="fa fa-phone"></i> {{ $address['phone'] }}<br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if ($customer['status'] === 'member')
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Riwayat Poin</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nama Petugas</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Poin Sebelumnya</th>
                                    <th class="text-center">Poin Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($audits) > 0)
                                    @foreach($audits as $key => $audit)
                                        <tr>
                                            <td class="text-center">
                                                <em class="text-muted">
                                                    {{ $audit->created_at->format('d-m-Y') }}
                                                </em>
                                            </td>
                                            <td class="fw-semibold text-center">
                                                {{ $audit->user ? $audit->user['name'] : ''  }}
                                            </td>
                                            <td class="text-center">
                                                {{ $audit->user ? $audit->user['role'] : ''  }}
                                            </td>
                                            <td class="text-center">
                                                @foreach($audit->old_values as $attribute => $value)
                                                    {{ $value }}
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @foreach($audit->new_values as $attribute => $value)
                                                    {{ $value }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
        @if ($customer['status'] != 'pending')
            <div class="modal fade" id="modal-block-slideup" tabindex="-1" role="dialog"
                aria-labelledby="modal-block-slideup" aria-hidden="true">
                <div class="modal-dialog modal-dialog-slideup" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">
                                    {{ 'Data Identitas' }}
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <a class="img-link img-link-zoom-in img-thumb img-lightbox"
                                    href="{{ Storage::url($customer['ktp_img']) }}">
                                    <img class="img-fluid" src="{{ Storage::url($customer['ktp_img']) }}"
                                        alt="">
                                </a>
                                <div class="block block-rounded">
                                    <div class="block-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-vcenter">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-semibold">
                                                            <a href="#">NIK</a>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                            <span>{{ $customer['nik'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">
                                                            <a href="#">Nama</a>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                            <span>{{ $customer['ktp_name'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">
                                                            <a href="#">Jenis Kelamin</a>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                            <span>{{ ($customer['ktp_gender'] == 'm') ? 'Laki-Laki' : 'Perempuan' }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">
                                                            <a href="#">Tempat, Tanggal Lahir</a>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                            <span>{{ $customer['ktp_dob'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">
                                                            <a href="#">Alamat Lengkap</a>
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                            <span>{{ $customer['ktp_address'] }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </main>
@endsection

@section('custom_js')
    <script src="{{ asset('assets/js/pages/customer_dialog.min.js') }}"></script>
@endsection
