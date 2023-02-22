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
                                    <th class="text-center" style="width:5%">No</th>
                                    <th class="text-center" style="width:10%">Tanggal</th>
                                    <th class="text-center" style="width:20%">Nama</th>
                                    <th class="text-center" style="width:10%">Jenis</th>
                                    <th class="text-center" style="width:55%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audits as $key => $audit)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="text-center">
                                            {{ $audit->created_at->format('d-m-Y') }}
                                        </td>
                                        <td class="fw-semibold">
                                            {{ $audit->user ? $audit->user['name'] : '' }}
                                            <em class="text-muted">
                                                ({{ $audit->user ? $audit->user['role'] : '' }})
                                            </em>
                                        </td>
                                        <td class="text-center">
                                            @if (str_contains($audit->url, 'login') !== false)
                                                Login
                                            @elseif(str_contains($audit->url, 'logout') !== false)
                                            Logout
                                            @else
                                            {{ $audit->event == 'deleted' ? 'Hapus' : ($audit->event == 'updated' ? 'Ubah' : 'Buat') }}
                                            @endif
                                        </td>
                                        <td style="width:100px">
                                            @if (str_contains($audit->url, 'login') !== false)
                                            <b>{{ $audit->user ? $audit->user['name'] : '' }}</b> ({{ $audit->user ? $audit->user['role'] : '' }}) telah login kedalam sistem
                                            @elseif(str_contains($audit->url, 'logout') !== false)
                                            <b>{{ $audit->user ? $audit->user['name'] : '' }}</b> ({{ $audit->user ? $audit->user['role'] : '' }}) telah logout
                                            @else
                                            <p>
                                                <b>{{ $audit->user ? $audit->user['name'] : '' }}</b>
                                                ({{ $audit->user ? $audit->user['role'] : '' }})
                                                telah
                                                {{ $audit->event == 'deleted' ? 'menghapus' : ($audit->event == 'updated' ? 'mengubah' : 'membuat') }}
                                                data
                                                <b>{{ substr($audit->auditable_type, 11) == "Member" ? "Customer" : substr($audit->auditable_type, 11) }}</b>
                                                dengan id {{ $audit->auditable_id }}
                                                <br>
                                                URL : <b>{{ $audit->url }}</b>
                                            </p>
                                            @if ($audit->old_values == [])
                                            <ul>
                                                @foreach ($audit->new_values as $attribute => $value)
                                                    <li>
                                                        {{ $attribute }} :
                                                        <br>{{ json_decode($value) ? json_encode(json_decode($value), JSON_PRETTY_PRINT) : $value }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @elseif ($audit->new_values == [])
                                            <p> Sebelum : </p>
                                            <ul>
                                                @foreach ($audit->old_values as $attribute => $value)
                                                    <li>
                                                        {{ $attribute }} :
                                                        <br>{{ json_decode($value) ? json_encode(json_decode($value), JSON_PRETTY_PRINT) : $value }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @else
                                            <p> Sebelum : </p>
                                            <ul>
                                                @foreach ($audit->old_values as $attribute => $value)
                                                    <li>
                                                        {{ $attribute }} :
                                                        <br>{{ json_decode($value) ? json_encode(json_decode($value), JSON_PRETTY_PRINT) : $value }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <p>Sesudah : </p>
                                            <ul>
                                                @foreach ($audit->new_values as $attribute => $value)
                                                    <li>
                                                        {{ $attribute }} :
                                                        <br>{{ json_decode($value) ? json_encode(json_decode($value), JSON_PRETTY_PRINT) : $value }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                            @endif
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
