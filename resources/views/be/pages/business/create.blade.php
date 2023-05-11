@extends('layouts.be-app')
@section('title', ' Tambah Data Member')

@section('content')

    <!-- Start Content-->
    <section>
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Data Member</h4>
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

                            <form class="needs-validation" method="POST" action="{{ route('business.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Foto Tempat</label>
                                    <input name="foto1" class="form-control mt-1 form-control-sm" id="formFileSm"
                                        type="file">
                                    <input name="foto2" class="form-control mt-1 form-control-sm" id="formFileSm"
                                        type="file">
                                    <input name="foto3" class="form-control mt-1 form-control-sm" id="formFileSm"
                                        type="file">
                                    <input name="foto4" class="form-control mt-1 form-control-sm" id="formFileSm"
                                        type="file">
                                    <input name="foto5" class="form-control mt-1 form-control-sm" id="formFileSm"
                                        type="file">
                                    <input name="foto6" class="form-control  form-control-sm" id="formFileSm"
                                        type="file">

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="vidio_yt" class="form-label">Link Vidio Youtube</label>
                                    <input type="text" name="vidio_yt" class="form-control" id="vidio_yt"
                                        placeholder="Masukan link vidio youtube" value="{{ old('vidio_yt') }}" required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_outlet" class="form-label">Nama Outlet</label>
                                    <input type="text" name="nama_outlet" class="form-control" id="nama_outlet"
                                        placeholder="Rencana nama outlet yang akan dijadikan tempat usaha"
                                        value="{{ old('nama_outlet') }}" required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                        placeholder="Alamat yang akan dijadikan tempat usaha" value="{{ old('alamat') }}"
                                        required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" name="kota" class="form-control" id="kota"
                                        placeholder="Kota yang akan dijadikan tempat usaha" value="{{ old('kota') }}"
                                        required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="waktu_bep" class="form-label">Waktu BEP</label>
                                    <input type="text" name="waktu_bep" class="form-control" id="waktu_bep"
                                        placeholder="Rencana waktu BEP" value="{{ old('waktu_bep') }}" required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="estimasi_bep" class="form-label">Estimasi BEP</label>
                                    <input type="text" name="estimasi_bep" class="form-control" id="estimasi_bep"
                                        placeholder="Rencana waktu BEP" value="{{ old('estimasi_bep') }}" required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Proposal</label>
                                    <input name="proposal" class="form-control  form-control-sm" id="formFileSm"
                                        type="file">

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="total_saham" class="form-label">Total Lembar Saham</label>
                                    <div class="input-group">
                                        <input type="number" name="total_saham" class="form-control" id="total_saham"
                                            placeholder="total_saham" aria-describedby="inputGroupPrepend"
                                            value="{{ old('total_saham') }}" required />

                                        {{-- Validation --}}
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="harga_saham" class="form-label">Harga Saham</label>
                                    <div class="input-group">
                                        <input type="number" name="harga_saham" class="form-control" id="harga_saham"
                                            placeholder="masukan harga saham" aria-describedby="inputGroupPrepend"
                                            value="{{ old('harga_saham') }}" required />

                                        {{-- Validation --}}
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="saham_terjual" class="form-label">Saham Terjual</label>
                                    <div class="input-group">
                                        <input type="number" name="saham_terjual" class="form-control"
                                            id="saham_terjual" placeholder="saham yang terjual"
                                            aria-describedby="inputGroupPrepend" value="{{ old('saham_terjual') }}"
                                            required />

                                        {{-- Validation --}}
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
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
