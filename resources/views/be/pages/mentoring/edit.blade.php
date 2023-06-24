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

                            <form class="needs-validation" method="POST" action="{{ route('mentoring.update',$item->id) }}"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Judul Vidio</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Judul Vidio Mentoring" value="{{ $item->name }}" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid Judul Vidio.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Vidio</label>
                                    <input type="text" name="description" class="form-control" id="description"
                                        placeholder="Deskripsi Vidio Mentoring"
                                        value="{{ $item->description }}" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid deskripsi vidio.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="vidio_yt" class="form-label">Link Vidio</label>
                                    <input type="text" name="vidio_yt" class="form-control" id="vidio_yt"
                                        placeholder="URL Vidio" value="{{ $item->vidio_yt }}"
                                        required />
                                    <div class="invalid-feedback">
                                        Please provide a valid link vidio.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar Thumbnail Vidio</label>
                                    <input name="image" class="form-control  form-control-sm" id="formFileSm"
                                        type="file">
                                    <div class="invalid-feedback">
                                        Please provide a valid thumbnail vidio.
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
