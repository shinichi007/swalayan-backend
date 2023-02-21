@extends('layouts.main')

@section('main')

<main id="main-container">
    <div class="content">
        <div
            class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
            <div>
                <h1 class="h3 mb-1">
                    {{ $title }}
                </h1>
                <p class="fw-medium mb-0 text-muted">
                    Selamat datang Admin!
                    Anda memiliki
                    <a class="fw-medium" href="/customers">
                        {{ $countPending  }} permintaan
                        member baru
                    </a>.
                </p>
            </div>
        </div>
        @include('partials.notif')
    </div>
    <div class="content">
        <div class="row items-push">
            <div class="col-sm-6 col-xl-4">
                <div class="block block-rounded text-center d-flex flex-column h-80 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-users fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{ count($customers) }}</div>
                        <div class="text-muted mb-3">Customer</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="block block-rounded text-center d-flex flex-column h-80 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-user-friends fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">
                            {{ count($members) }}
                        </div>
                        <div class="text-muted mb-3">Member</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="block block-rounded text-center d-flex flex-column h-80 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-check fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{ $countPending }}</div>
                        <div class="text-muted mb-3">Permintaan Member Baru</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded block-mode-loading-refresh">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Daftar Non Member
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Nama</th>
                                    <th class="d-none d-xl-table-cell">Email</th>
                                    <th>No HP</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers->take(10) as $customer)

                                    <tr>
                                        <td>
                                            <span class="fw-semibold">
                                                {{ $customer['name'] }}
                                            </span>
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            <span class="fs-sm text-muted">
                                                {{ $customer['email'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-warning">
                                                {{ $customer['phone'] }}
                                            </span>
                                        </td>
                                        <td class="text-center text-nowrap fw-medium">
                                            <a href="{{ url('/customer/'.$customer['member_id']) }}">
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="block-content block-content-full block-content-sm bg-body-light fs-sm text-center">
                        <a class="fw-medium" href="{{ url('/customers') }}">
                            Lihat Semua Customer
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded block-mode-loading-refresh">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Daftar Member
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Nama</th>
                                    <th class="d-none d-xl-table-cell">Email</th>
                                    <th>No HP</th>
                                    <th class="d-none d-sm-table-cell text-end" style="width: 120px;">Poin</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members->take(10) as $member)
                                <tr>
                                    <td>
                                        <span class="fw-semibold">
                                            {{ $member->user['name'] }}
                                        </span>
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <span class="fs-sm text-muted">
                                            {{ $member->user['email'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-warning">
                                            {{ $member->user['phone'] }}
                                        </span>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end fw-medium">
                                        {{ $member['point'] }}
                                    </td>
                                    <td class="text-center text-nowrap fw-medium">
                                        <a href="{{ url('/customer/'.$member['id']) }}">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="block-content block-content-full block-content-sm bg-body-light fs-sm text-center">
                        <a class="fw-medium" href="{{ url('/customers') }}">
                            Lihat Semua Member
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection
