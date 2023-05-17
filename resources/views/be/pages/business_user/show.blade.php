@extends('layouts.be-app')

@section('title', 'List Rencana Outlet')
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
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Rencana Outlet</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="tab-content pt-0">
                                        @for ($i = 1; $i <= 6; $i++)
                                            <div class="tab-pane {{ $i == 1 ? 'active show' : '' }}"
                                                id="product-{{ $i }}-item">
                                                <img src="{{ Storage::url($item->{'foto' . $i}) }}" alt=""
                                                    class="img-fluid mx-auto d-block rounded">
                                            </div>
                                        @endfor
                                    </div>
                                    <ul class="nav nav-pills nav-justified">
                                        @for ($i = 1; $i <= 6; $i++)
                                            <li class="nav-item">
                                                <a href="#product-{{ $i }}-item" data-bs-toggle="tab"
                                                    aria-expanded="{{ $i == 1 ? 'false' : 'true' }}"
                                                    class="nav-link product-thumb {{ $i == 1 ? 'active show' : '' }}">
                                                    <img src="{{ Storage::url($item->{'foto' . $i}) }}" alt=""
                                                        class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="ps-xl-3 mt-3 mt-xl-0">
                                        <div class="row mb-3">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.youtube.com/embed/{{ $item->vidio_yt }}"
                                                    title="YouTube video" allowfullscreen></iframe>
                                            </div>
                                            <div class="mt-3 col-12">
                                                <a name="" id="" class="btn btn-success"
                                                    href="https://wa.me/6285939191929" role="button">Hubungi Kami</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body row">

                            <div class="col-md-6">
                                <div class="card p-2">
                                    <img src="{{ Storage::url($item->proposal) }}" class="img-fluid" alt="...">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card p-2">
                                    <h2 class="mb-3">{{ $item->nama_outlet }}</h2>
                                    <p><i class="mdi mdi-map-marker-outline text-primary"></i> Alamat : {{ $item->alamat }}
                                    </p>
                                    <p><i class="mdi mdi-city text-primary"></i> Kota : {{ $item->kota }}</p>
                                    <p><i class="mdi mdi-google-analytics text-primary"></i> Waktu BEP :
                                        {{ $item->waktu_bep }}</p>
                                    <p><i class="mdi mdi-account-multiple-plus text-primary"></i> Estimasi BEP :
                                        {{ $item->estimasi_bep }}</p>
                                    <p><i class="mdi mdi-currency-usd text-primary"></i> Total Saham :
                                        {{ $item->total_saham }}</p>
                                    <p><i class="mdi mdi-currency-usd text-primary"></i> Harga Saham :
                                        {{ $item->harga_saham }}</p>
                                    <p><i class="mdi mdi-currency-usd text-primary"></i> Saham Terjual :
                                        {{ $item->saham_terjual }}</p>
                                    <p><i class="mdi mdi-currency-usd text-primary"></i> Sisa Saham :
                                        {{ $item->total_saham - $item->saham_terjual }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    @endif


@endsection
