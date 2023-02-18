@extends('layouts.main')

@section('main')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Daftar User</h1>
                    <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="block block-rounded">
                <ul class="nav nav-tabs nav-tabs-block align-items-center" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="btabs-static-admin-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static-admin" role="tab" aria-controls="btabs-static-admin"
                            aria-selected="true">Admin</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="btabs-static-operator-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static-operator" role="tab" aria-controls="btabs-static-operator"
                            aria-selected="false">Operator</button>
                    </li>
                    <li class="nav-item ms-auto">
                        <div class="btn-group btn-group-sm pe-2">
                            <button type="button" class="btn btn-alt-secondary" data-bs-toggle="modal"
                                data-bs-target="#modal-block-fromright">
                                <i class="fa fa-fw fa-add"></i> Tambah
                            </button>
                        </div>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="btabs-static-admin" role="tabpanel"
                        aria-labelledby="btabs-static-admin-tab" tabindex="0">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="d-none d-sm-table-cell text-center">Email</th>
                                    <th class="d-none d-sm-table-cell text-center">No HP</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($admins)>0)
                                    @foreach ($admins as $key => $admin)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="fw-semibold">
                                            {{ $admin->name }}
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <em class="text-muted">
                                                {{ $admin->email }}
                                            </em>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">
                                                {{ $admin->phone }}
                                            </em>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success">
                                                {{ $admin->role }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" bis_skin_checked="1">
                                                <button type="button"
                                                    class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#modal-block-fromright">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-alt-secondary js-swal-confirm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="btabs-static-operator" role="tabpanel"
                        aria-labelledby="btabs-static-operator-tab" tabindex="1">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="d-none d-sm-table-cell text-center">Email</th>
                                    <th class="d-none d-sm-table-cell text-center">No HP</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($operators)>0)
                                    @foreach ($operators as $key => $operator)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="fw-semibold">
                                            {{ $operator->name }}
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <em class="text-muted">
                                                {{ $operator->email }}
                                            </em>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">
                                                {{ $operator->phone }}
                                            </em>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success">
                                                {{ $operator->role }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" bis_skin_checked="1">
                                                <button type="button"
                                                    class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#modal-block-fromright">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-alt-secondary js-swal-confirm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modal-block-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromright"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-fromright" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Tambah User</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="mb-4" bis_skin_checked="1">
                            <label class="form-label" for="example-text-input">Nama</label>
                            <input type="text" class="form-control" id="example-text-input" name="name"
                                placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="mb-4" bis_skin_checked="1">
                            <label class="form-label" for="example-text-input">Email</label>
                            <input type="email" class="form-control" id="example-text-input" name="email"
                                placeholder="Masukan Email" required>
                        </div>
                        <div class="mb-4" bis_skin_checked="1">
                            <label class="form-label" for="example-text-input">Nomor HP</label>
                            <input type="text" class="form-control" id="example-text-input" name="phone"
                                placeholder="Masukan Nomor HP Lengkap" required>
                        </div>
                        <div class="mb-4" bis_skin_checked="1">
                            <label class="form-label" for="example-text-input">Password</label>
                            <input type="password" class="form-control" id="example-text-input" name="password"
                                placeholder="Masukan Password" required>
                        </div>
                        <div class="mb-4" bis_skin_checked="1">
                            <label class="form-label" for="example-select">Role</label>
                            <select class="form-select" id="example-select" name="role" required>
                                <option selected="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-sm btn-primary js-swal-success"
                            data-bs-dismiss="modal">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script src="{{ asset('assets/js/pages/add_user_dialog.min.js') }}"></script>
@endsection
