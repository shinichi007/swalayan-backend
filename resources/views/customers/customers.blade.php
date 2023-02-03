@extends('layouts.main')
@section('main')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Daftar Customer</h1>
                    <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Customer</li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Customer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="block block-rounded">
                <ul class="nav nav-tabs nav-tabs-block" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="btabs-static-pending-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static-pending" role="tab" aria-controls="btabs-static-pending"
                            aria-selected="true">Pending</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="btabs-static-regular-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static-regular" role="tab" aria-controls="btabs-static-regular"
                            aria-selected="false">Reguler</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="btabs-static-member-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static-member" role="tab" aria-controls="btabs-static-member"
                            aria-selected="false">Member</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="btabs-static-all-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static-all" role="tab" aria-controls="btabs-static-all"
                            aria-selected="false">Semua</button>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="btabs-static-pending" role="tabpanel"
                        aria-labelledby="btabs-static-pending-tab" tabindex="0">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="d-none d-sm-table-cell text-center">Email</th>
                                    <th class="d-none d-sm-table-cell text-center">No HP</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indexPending = 1; ?>
                                @foreach ($pending as $key => $pen)
                                    <tr>
                                        <td class="text-center">{{ $indexPending++ }}</td>
                                        <td class="fw-semibold">
                                            <a href="customer/{{ $pen['id'] }}">{{ $pen['data']['name'] }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell"><em class="text-muted">{{ $pen['data']['email'] }}</em>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">{{ $pen['data']['phone'] }}</em>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-danger">
                                                Pending</span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="btabs-static-regular" role="tabpanel"
                        aria-labelledby="btabs-static-regular-tab" tabindex="1">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="d-none d-sm-table-cell text-center">Email</th>
                                    <th class="d-none d-sm-table-cell text-center">No HP</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indexRegular = 1; ?>
                                @foreach ($regular as $key => $reg)
                                    <tr>
                                        <td class="text-center">{{ $indexRegular++ }}</td>
                                        <td class="fw-semibold">
                                            <a href="customer/{{ $reg['id'] }}">{{ $reg['data']['name'] }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell"><em class="text-muted">{{ $reg['data']['email'] }}</em>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">{{ $reg['data']['phone'] }}</em>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-info">
                                                Reguler</span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="btabs-static-member" role="tabpanel" aria-labelledby="btabs-static-member-tab"
                        tabindex="2">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="d-none d-sm-table-cell text-center">Email</th>
                                    <th class="d-none d-sm-table-cell text-center">No HP</th>
                                    <th class="text-center">Status</th>
                                    <th class="d-none d-sm-table-cell text-center">ID Member</th>
                                    <th class="text-center">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indexMember = 1; ?>
                                @foreach ($member as $key => $mem)
                                    <tr>
                                        <td class="text-center">{{ $indexMember++ }}</td>
                                        <td class="fw-semibold">
                                            <a href="customer/{{ $mem['id'] }}">{{ $mem['data']['name'] }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell"><em class="text-muted">{{ $mem['data']['email'] }}</em>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">{{ $mem['data']['phone'] }}</em>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success">
                                                Member</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">{{ $mem['member']['id'] }}</em>
                                        </td>
                                        <td class="text-center">
                                            <em class="text-muted">{{ $mem['member']['point'] }}</em>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="btabs-static-all" role="tabpanel" aria-labelledby="btabs-static-all-tab"
                        tabindex="3">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="d-none d-sm-table-cell text-center">Email</th>
                                    <th class="d-none d-sm-table-cell text-center">No HP</th>
                                    <th class="text-center">Status</th>
                                    <th class="d-none d-sm-table-cell text-center">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indexAll = 1; ?>
                                @foreach ($customers as $key => $cust)
                                    <tr>
                                        <td class="text-center">{{ $indexAll++ }}</td>
                                        <td class="fw-semibold">
                                            <a href="customer/{{ $cust['id'] }}">{{ $cust['data']['name'] }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell"><em class="text-muted">{{ $cust['data']['email'] }}</em>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">{{ $cust['data']['phone'] }}</em>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge {{ $cust['member']['status'] === 'member' ? 'bg-success' : ($cust['member']['status'] === 'pending' ? 'bg-danger' : 'bg-info') }}">
                                                {{ $cust['member']['status'] === 'member' ? 'Member' : ($cust['member']['status'] === 'pending' ? 'Pending' : 'Reguler') }}</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-center">
                                            <em class="text-muted">{{ $cust['member']['point'] }}</em>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
