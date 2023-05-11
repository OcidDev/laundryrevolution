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

                            <form class="needs-validation" method="POST" action="{{ route('member.store') }}" novalidate>
                                @csrf
                                {{-- <div class="mb-3">
                                    <label for="no" class="form-label">Nomor Member</label>

                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                    <input type="hidden" readonly value="{{ 'LD-' . $kd }}" name="no_member"
                                        class="form-control" id="no" required />
                                    <input type="hidden" readonly value="memberpassword" name="passwrod"
                                        class="form-control" required />
                                    <input type="hidden" readonly value="memberpassword" name="passwrod_confirm"
                                        class="form-control" required />
                                    <input type="text" name="fullname" class="form-control" id="fullname"
                                        placeholder="Masukan nama lengkap" value="{{ old('fullname') }}" required />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="marking_kode" class="form-label">Marking Kode</label>
                                    <div class="input-group">
                                        <input type="marking_kode" name="marking_kode" class="form-control"
                                            id="marking_kode" placeholder="marking kode"
                                            aria-describedby="inputGroupPrepend" value="{{ old('marking_kode') }}"
                                            required />
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email" aria-describedby="inputGroupPrepend"
                                            value="{{ old('email') }}" required />
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="no_wa" class="form-label">Nomor WhatsApp</label>
                                    <input type="number" name="no_whatsapp" class="form-control" id="no_wa"
                                        placeholder="628xxxxxx" value="{{ old('no_wa') }}" required />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" name="kota" class="form-control" id="kota"
                                        placeholder="Kota Tmepat Tinggal" value="{{ old('kota') }}" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kota_ws" class="form-label">Kota Workshop</label>
                                    <input type="text" name="kota_ws" class="form-control" id="kota_ws"
                                        placeholder="Kota Mengikuti Workshop" value="{{ old('kota_ws') }}" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid Kota Workshop.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="usaha" class="form-label">Bidang Usaha</label>
                                    <input type="text" name="usaha" class="form-control" id="usaha"
                                        placeholder="Usaha yang sedang di tekuni saat ini" value="{{ old('usaha') }}"
                                        required />
                                    <div class="invalid-feedback">
                                        Please provide a valid Bidang Usaha.
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
