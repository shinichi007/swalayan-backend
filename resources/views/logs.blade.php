@extends('layouts.main')
@section('main')
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">User Log</h1>
                           </div>
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
              <div class="block-content tab-content">
                <div class="tab-pane active" id="btabs-static-pending" role="tabpanel"
                    aria-labelledby="btabs-static-pending-tab" tabindex="0">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nama User</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Data Sebelum</th>
                                <th class="text-center">Data Sesudah</th>
                            </tr>
                        </thead>
                        @foreach($audits as $key => $audit)
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        {{$key+1}}
                                    </td>
                                    <td class="text-center">
                                        {{ $audit->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="fw-semibold">
                                        {{ $audit->user ? $audit->user['name'] : ''  }}
                                    </td>
                                    <td class="text-center">
                                        <em class="text-muted">
                                            {{ $audit->user ? $audit->user['role'] : ''  }}
                                        </em>
                                    </td>
                                    <td>
                                        <ul>
                                        @foreach($audit->old_values as $attribute => $value)
                                            <li>{{ $attribute }} : {{ $value }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                        @foreach($audit->new_values as $attribute => $value)
                                            <li>{{ $attribute }} : {{ $value }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
