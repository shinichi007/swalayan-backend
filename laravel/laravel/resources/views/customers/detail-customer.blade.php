@extends('layouts.main')

@section('main')
    @foreach ($customer as $key => $cust)
        <main id="main-container">
            <div class="content">
                <div class="row items-push">
                    <div class="col-6">
                        <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                            href="/customer/edit/{{ $cust['id'] }}">
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
                            href="javascript:void(0)">
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
                                <img class="img-avatar img-avatar96" src="{{ $cust['data']['avatar'] }}" alt="">
                            </div>
                            <h1 class="fs-lg mb-0">
                                {{ $cust['data']['name'] }}
                            </h1>
                            @if ($cust['member']['status'] == 'member')
                                <p class="text-muted">
                                    <i class="fa fa-award text-warning me-1"></i>
                                    Member
                                </p>
                                <p class="text-muted">ID : {{ $cust['member']['id'] }}</p>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modal-block-slideup">Lihat Data Identitas</button>
                            @elseif ($cust['member']['status'] == 'pending')
                                <p class="text-muted">
                                    Pending
                                </p>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-block-slideup">Verifikasi Identitas</button>
                            @else
                                <p class="text-muted">
                                    Reguler
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="block-content bg-body-light text-center">
                        <div class="row items-push">
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">Email</div>
                                <a class="link-fx" href="javascript:void(0)">{{ $cust['data']['email'] }}</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">No HP</div>
                                <a class="link-fx" href="javascript:void(0)">{{ $cust['data']['phone'] }}</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">Gender</div>
                                <a class="link-fx"
                                    href="javascript:void(0)">{{ $cust['data']['gender'] === 'male' ? 'Laki-Laki' : 'Perempuan' }}</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">Poin</div>
                                <a class="link-fx" href="javascript:void(0)">{{ $cust['member']['point'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Alamat ({{ count($cust['address']) }})</h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            @foreach ($cust['address'] as $address)
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
                                                {{ $address['zip'] }}<br><br>
                                                <i class="fa fa-phone"></i> {{ $address['phone'] }}<br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if ($cust['member']['status'] === 'member')
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
                                    <tr>
                                        <td class="text-center"><em class="text-muted">02-02-2023</em>
                                        </td>
                                        <td class="fw-semibold text-center">
                                            <a href="#">Abdul Mutohir</a>
                                        </td>
                                        <td class="text-center">Operator</td>
                                        <td class="text-center">0
                                        </td>
                                        <td class="text-center">{{ $cust['member']['point'] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
            @if ($cust['member']['status'] == 'member' || $cust['member']['status'] == 'pending')
                <div class="modal fade" id="modal-block-slideup" tabindex="-1" role="dialog"
                    aria-labelledby="modal-block-slideup" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-slideup" role="document">
                        <div class="modal-content">
                            <div class="block block-rounded block-themed block-transparent mb-0">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">
                                        {{ $cust['member']['status'] === 'pending' ? 'Verifikasi Identitas' : 'Data Identitas' }}
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
                                        href="{{ $cust['member']['data']['ktp'] }}">
                                        <img class="img-fluid" src="{{ $cust['member']['data']['ktp'] }}"
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
                                                                <span>{{ $cust['member']['data']['nik'] }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                <a href="#">Nama</a>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span>{{ $cust['member']['data']['ktp_name'] }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                <a href="#">Jenis Kelamin</a>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span>{{ $cust['member']['data']['gender'] }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                <a href="#">Tempat, Tanggal Lahir</a>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span>{{ $cust['member']['data']['dob'] }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                <a href="#">Alamat Lengkap</a>
                                                            </td>
                                                            <td>:</td>
                                                            <td>
                                                                <span>{{ $cust['member']['data']['address'] }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            @if ($cust['member']['status'] == 'pending')
                                                <div id="verifikasi">
                                                    <div class="mb-4">
                                                        <select class="js-select2 form-select" style="width: 100%;"
                                                            data-container="#modal-block-slideup"
                                                            data-placeholder="Pilih Status">
                                                            <option></option>
                                                            <option value="member">Approve</option>
                                                            <option value="reject">Reject</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" class="form-control" id="example-text-input"
                                                        name="example-text-input"
                                                        placeholder="Keterangan (Opsional) Cth. Foto KTP Tidak Jelas">
                                                    <br>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-dismiss="modal">Submit</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </main>
    @endforeach
@endsection

@section('custom_js')
    <script src="{{ asset('assets/js/pages/customer_dialog.min.js') }}"></script>
@endsection
