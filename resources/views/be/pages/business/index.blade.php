@extends('layouts.be-app')

@section('title', ' Member')
@push('before-style')
    <link href="/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')

    @if (Auth::User()->status !== 'AKTIF')
        <center>
            <h4 class="mt-5">Anda tidak di izinkan untuk melihat data kami. silahkan hubungi admin terlebih dahulu</h4>
        </center>
        <center>
            <a class="btn btn-lg btn-success" href="https://wa.me/6285939191929" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
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
                            <a class="btn btn-sm btn-success text-right position-relative"
                                href="{{ route('member.create') }}" role="button">Tambah Data</a>
                        </div>
                    @endif
                </div>
                <!--row-->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive ">
                                <table id="DataTables" class="table table-hover table-striped table-bordered nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Nama Outlet</th>
                                            <th>Foto Tempat</th>
                                            <th>Alamat</th>
                                            <th>kota</th>
                                            <th>Estimasi waktu BEP</th>
                                            <th>Detail</th>
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
        $(document).ready(function() {
            var datatable = $('#DataTables').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },

                columns: [
                    { data:'nama_outlet', name:'nama_outlet'},
                    {
                        data:'foto1',
                        name:'foto1',
                        orderable:false,
                        searchable:false,
                        ordering: false,
                        width:'100px',
                        height: '50px',
                    },
                    { data:'alamat', name:'alamat'},
                    { data:'kota', name:'kota'},
                    { data:'waktu_bep', name:'waktu_bep'},
                    {
                        data:'gabung',
                        name:'gabung',
                        orderable:false,
                        searchable:false,
                        ordering: false,
                    },
                    {
                        data:'action',
                        name:'action',
                        orderable:false,
                        searchable:false,
                        width:'150px'
                    },
                ]
            });
        });
    </script>
@endpush
