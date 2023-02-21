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
                    @if(Auth::user()->role=='admin')
                    <li class="nav-item ms-auto">
                        <div class="btn-group btn-group-sm pe-2">
                            <a href="{{ URL('/users/create') }}" class="btn btn-alt-secondary">
                                <i class="fa fa-fw fa-add"></i>
                                Tambah
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>
                @include('partials.notif')
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
                                            @if(Auth::user()->role == 'admin')
                                                <div class="btn-group" bis_skin_checked="1">
                                                    <a href="{{ URL('/users/'.$admin->id.'/edit') }}"
                                                        class="btn btn-sm btn-alt-secondary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <button type="button"
                                                        class="btn btn-sm btn-alt-secondary">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            @endif
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
                                        @if(Auth::user()->role == 'admin')
                                            <div class="btn-group" bis_skin_checked="1">
                                                <a href="{{ URL('/users/'.$operator->id.'/edit') }}"
                                                    class="btn btn-sm btn-alt-secondary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form method="POST" action="{{ URL('/users/'.$operator->id.'/delete') }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" id="delete_user" class="btn btn-sm btn-alt-secondary" data-toggle="tooltip" title='Delete'>
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
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
@endsection

@section('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/pages/add_user_dialog.min.js') }}"></script>
    <script type="text/javascript">

        $('#delete_user').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Kamu yakin akan menghapus user ini?`,
                text: "Jika iya, data tidak dapat dikembalikan.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
            });
        });

    </script>
@endsection
