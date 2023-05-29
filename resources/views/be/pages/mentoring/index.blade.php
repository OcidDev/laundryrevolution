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
                            <h4 class="page-title">Video Mentoring</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row mb-3">
                    <div class="col-12">
                        @if (Auth::User()->role == 'ADMIN')
                            <a class="btn btn-primary" href="{{ route('mentoring.create') }}" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tambah Vidio
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $item->name }}</h3>
                                    <p class="card-text"> {{ $item->description }}</p>
                                    <a href="{{ route('mentoring.show', $item->id) }}" class="btn btn-primary">Lihat
                                        Vidio</a>
                                    <form action="{{ route('mentoring.destroy', $item->id) }}" class="mt-1" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-warning" href="{{ route('mentoring.edit',$item->id) }}" role="button">Edit</a>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div> <!-- container -->
        </section>
    @endif


@endsection
