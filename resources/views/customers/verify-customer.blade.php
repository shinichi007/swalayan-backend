@extends('layouts.main')

@section('main')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i>
                        Verifikasi Data
                    </h2>
                    @include('partials.notif')
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="block-content">
                                <a class="img-link img-link-zoom-in img-thumb img-lightbox"
                                    href="{{ Storage::url($customer['ktp_img']) }}">
                                    <img class="img-fluid" src="{{ Storage::url($customer['ktp_img']) }}" width="50%">
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
                                                            <span>{{ $customer['ktp_gender'] == 'm' ? 'Laki-Laki' : 'Perempuan' }}</span>
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
                                        @if ($customer['status'] == 'pending')
                                            <form action="{{ URL('/customer/'.$customer['id'].'/verification') }}" method="POST">
                                                @csrf
                                                <div id="verifikasi">
                                                    <div class="mb-4">
                                                        <select class="status form-select" style="width: 100%;"
                                                            onchange="statusCheck(this.select);"
                                                            data-placeholder="Pilih Status" name="status" required>
                                                            <option>Pilih Status</option>
                                                            <option value="member">Approve</option>
                                                            <option value="reject">Reject</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" class="form-control" id="reason"
                                                        name="reason"
                                                        placeholder="Keterangan (Opsional) Cth. Foto KTP Tidak Jelas"
                                                        style="display: none;">
                                                    <input type="number" class="code form-control" min='1000000000' max='999999999999'
                                                        name="code" id="code"
                                                        placeholder="1235xxxxxxxx" style="display: none;">
                                                    <br>
                                                    <div class="row push">
                                                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                                                        <div class="mb-4">
                                                            <button type="submit" class="btn btn-primary" id="verifikasi">
                                                                Verifikasi
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('custom_js')
<script>
    $(document).ready(function(){
        $("select.status").change(function() {
            val = $(this).val();
            if(val=='member'){
                $('#code').show();
                $('#reason').hide();
                $('#code').attr("required", true);
                $('#reason').attr("required", false);
            }
            if(val=='reject'){
                $('#code').hide();
                $('#reason').show();
                $('#code').attr("required", false);
                $('#reason').attr("required", true);
            }
            if(val==0){
                $('#code').hide();
                $('#reason').hide();
                $('#code').attr("required", false);
                $('#reason').attr("required", false);
            }
        });
    });
</script>
<script src="{{ asset('assets/js/pages/edit_customer_dialog.min.js') }}"></script>
@endsection
