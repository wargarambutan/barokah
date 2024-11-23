@extends('layouts.app')

@section('title', 'Pengajuan Keluhan')

@section('content')

    <!-- Form Start -->
    <div class="container-fluid full-page">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h1 class="display-6 mb-2">Silahkan Laporkan Keluhan Anda</h1>
                        <div class="col-6 mt-0">
                            <a href="{{ route('cek-keluhan') }}" class="btn btn-secondary rounded-pill py-2 px-4">Cek
                                Keluhan</a>
                        </div>
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
                                    <select class="form-control" id="keluhan" name="keluhan" required>
                                        <option value="Tidak ada koneksi internet">Tidak ada koneksi internet</option>
                                        <option value="Lampu merah/lost">Lampu merah/lost</option>
                                        <option value="Kabel putus">Kabel putus</option>
                                        <option value="Koneksi lambat">Koneksi lambat</option>
                                    </select>
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
