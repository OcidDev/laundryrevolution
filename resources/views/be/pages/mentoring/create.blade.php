@extends('layouts.be-app')
@section('title', ' Tambah Data Mentor')

@section('content')

    <!-- Start Content-->
    <section>
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Data Mentor</h4>
                    </div>
                </div>
            </div>

            <!-- end page title -->

            <!-- end row-->
            <div class="row">
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" method="POST" action="{{ route('mentoring.store') }}"
                                enctype="multipart/form-data" novalidate>
                                @csrf


                                <div class="mb-3">
                                    <label for="name" class="form-label">Judul Vidio</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Kota Mengikuti Workshop" value="{{ old('name') }}" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid Judul Vidio.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Vidio</label>
                                    <input type="text" name="description" class="form-control" id="description"
                                        placeholder="description yang sedang di tekuni saat ini"
                                        value="{{ old('description') }}" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid deskripsi vidio.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="vidio_yt" class="form-label">Link Vidio</label>
                                    <input type="text" name="vidio_yt" class="form-control" id="vidio_yt"
                                        placeholder="vidio_yt yang sedang di tekuni saat ini" value="{{ old('vidio_yt') }}"
                                        required />
                                    <div class="invalid-feedback">
                                        Please provide a valid deskripsi vidio.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Thumbnail Vidio</label>
                                    <input name="image" class="form-control  form-control-sm" id="formFileSm"
                                        type="file">
                                    <div class="invalid-feedback">
                                        Please provide a valid deskripsi vidio.
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Simpan Data</button>
                            </form>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>

        </div> <!-- container -->
    </section>
@endsection
