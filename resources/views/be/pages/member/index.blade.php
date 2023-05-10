@extends('layouts.be-app')

@section('title', ' Member')
@push('before-style')
        <link href="/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')

    @if (Auth::User()->status !== 'AKTIF')
        <center><h4 class="mt-5">Anda tidak di izinkan untuk melihat data kami. silahkan hubungi admin terlebih dahulu</h4></center>
        <center>
            <a class="btn btn-lg btn-success" href="https://wa.me/6285939191929" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-whatsapp me-1"></i>Admin
            </a>
        </center>

    @else
        <!-- Start Content-->
    <section>
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Data Member</h4>
                    </div>
                </div>
            </div>

            <!-- end page title -->
            <div class="row mb-3 ">
                @if (Auth::User()->role == 'ADMIN')

                <div class="col d-flex flex-row">
                    <a class="btn btn-sm btn-success text-right position-relative" href="{{ route('member.create') }}" role="button">Tambah Data</a>
                </div>
                @endif
            </div><!--row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive ">
                            <div class="dropdown mb-2 d-flex flex-row-reverse">
                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-filter-variant me-2"></i>Filter
                                </a>

                                <div action="" class="dropdown-menu p-3" style="width:200px">
                                    <div class=" mb-1">
                                        <label for="kota" class="form-label">Asal Kota</label>
                                        <input type="text" id="cari" class="form-control form-control-sm filter-input-kota" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"placeholder="Kota Asal">
                                    </div>
                                    <div class=" mb-2">
                                        <label for="kota_ws" class="form-label">Kota Workshop</label>
                                        <input type="text" id="cari" class="form-control form-control-sm filter-input-kota-ws" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"placeholder="Kota Workshop">
                                    </div>
                                    {{-- <button type="submit" id="cari" class="btn btn-primary btn-sm">Cari</button> --}}
                                </div>
                            </div><!--dropdown-->
                            <table id="DataTables" class="table table-hover table-striped table-bordered nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No Member</th>
                                        <th>Marking Kode</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>No WhatsApp</th>
                                        <th>Kota</th>
                                        <th>Kota Workshop</th>
                                        <th>Bidang Usaha</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->
    </section>
    @endif


@endsection
@push('after-script')
        <!-- third party js -->
        <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            var datatable = $('#DataTables').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url:'{!! url()->current() !!}',
                },

                columns: [
                    { data:'no_member', name:'no_member'},
                    { data:'marking_kode', name:'marking_kode'},
                    { data:'fullname', name:'fullname'},
                    { data:'email', name:'email'},
                    { data:'no_whatsapp', name:'no_whatsapp'},
                    { data:'kota', name:'kota'},
                    { data:'kota_ws', name:'kota_ws'},
                    { data:'usaha', name:'usaha'},
                    {
                        data:'action',
                        name:'action',
                        orderable:false,
                        searchable:false,
                        width:'150px'
                    },
                ]
            });
            function delay(callback, ms) {
                var timer = 0;
                return function() {
                    var context = this, args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                    callback.apply(context, args);
                    }, ms || 0);
                };
                }
            $('#cari').keyup(delay(function (e) {
                datatable.column(5)
                .search($('.filter-input-kota').val()),

                datatable.column(6)
                .search($('.filter-input-kota-ws').val())
                .draw();
            },1500));

        });
    </script>
@endpush
