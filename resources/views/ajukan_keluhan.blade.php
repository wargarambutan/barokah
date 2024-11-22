@extends('layouts.app')

@section('title', 'Pengajuan Keluhan')

@section('content')

    <!-- Form Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h1 class="display-6 mb-2">Silahkan Laporkan Keluhan Anda</h1>
                        @if (session('success'))
                            <div class="alert alert-success mt-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('ajukan-keluhan.post') }}" method="POST">
                            @csrf
                            <div class="row g-4 mt-3">
                                <div class="col-md-6">
                                    <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="keluhan" class="form-label">Isi Keluhan</label>
                                    <input type="text" class="form-control" id="keluhan" name="keluhan" required>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary rounded-pill py-2 px-4">Ajukan
                                    Keluhan</button>
                                <a href="{{ route('index') }}" class="btn btn-secondary rounded-pill py-2 px-4">Kembali</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Form End -->

@endsection

@section('scripts')

@endsection
