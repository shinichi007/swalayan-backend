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
                                <th class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">10-02-2023</td>
                                    <td class="fw-semibold">Udin</td>
                                    <td class="text-center"><em class="text-muted">Operator</em>
                                    </td>
                                    <td class="text-center">Edit Member Zulfa Hassanah</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">11-02-2023</td>
                                    <td class="fw-semibold">Umar</td>
                                    <td class="text-center"><em class="text-muted">Operator</em>
                                    </td>
                                    <td class="text-center">Edit Poin Zulfa Hassanah</td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection