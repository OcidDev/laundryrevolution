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
                        <h4 class="page-title">Tambah Laporan Outlet</h4>
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

                            <form class="needs-validation" method="POST" action="{{ route('report.store') }}"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="business_id" class="form-label">Nama Outlet</label>

                                    <select class="form-select" name="business_id"  aria-label="business_id">
                                        <option selected>Pilih nama outlet</option>

                                        @foreach ($business as $busines)

                                        <option value="{{ $busines->id }}">{{ $busines->nama_outlet }}</option>
                                        @endforeach
                                    </select>

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="penjualan" class="form-label">Penjualan</label>
                                    <input type="number" name="penjualan" class="form-control" id="penjualan"
                                        placeholder="penjualan yang akan dijadikan tempat usaha" value="{{ old('penjualan') }}"
                                        required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="pengeluaran" class="form-label">Pengeluaran</label>
                                    <input type="number" name="pengeluaran" class="form-control" id="pengeluaran"
                                        placeholder="pengeluaran yang akan dijadikan tempat usaha" value="{{ old('pengeluaran') }}"
                                        required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="stor_bank" class="form-label">Stor Bank</label>
                                    <input type="text" name="stor_bank" class="form-control" id="stor_bank"
                                        placeholder="Rencana waktu BEP" value="{{ old('stor_bank') }}" required />

                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
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
