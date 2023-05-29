@extends('layouts.be-app')
@section('title', ' Tambah Data AKses Member')

@section('content')

    <!-- Start Content-->
    <section>
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Data Akses Member</h4>
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

                            <form class="needs-validation" method="POST" action="{{ route('business_user.store') }}"
                                enctype="multipart/form-data" novalidate>
                                @csrf

                                <div class="mb-3">
                                    <label for="users_id" class="form-label">Nama User</label>
                                    <select name="users_id" class="form-control" id="users_id">
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                        @endforeach
                                    </select>
                                    {{-- Validation --}}
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="business_id" class="form-label">Nama Outlet</label>
                                    <select name="business_id" class="form-control" id="business_id">
                                        @foreach ($businesses as $business)
                                        <option value="{{ $business->id }}">{{ $business->nama_outlet }}</option>
                                        @endforeach
                                    </select>
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
