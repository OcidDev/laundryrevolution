@extends('layouts.be-app')

@section('title', ' Mentoring')
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
                            <h4 class="page-title">Judul Video Mentoring</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="ratio ratio-16x9 text-center">
                                    <iframe class="embed-responsive-item"
                                        src="https://www.youtube.com/embed/DTpvdyzxQWE?controls=0"
                                        style="max-width: 100%;height: 100%;" allowfullscreen></iframe>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-primary hBack" role="button">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container -->
        </section>
    @endif


@endsection
@push('after-script')
    <script>
        $(".hBack").on("click", function(e) {
            e.preventDefault();
            window.history.back();
        });
    </script>
@endpush
