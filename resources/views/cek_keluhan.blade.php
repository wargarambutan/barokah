@extends('layouts.app')

@section('title', 'Cek Keluhan')

@section('content')


    <!-- Form Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="display-6 mb-4">Cek Keluhan</h1>

            <form action="{{ route('cek-keluhan') }}" method="GET">
                @csrf
                <div class="row g-4">
                    <div class="col-md-12">
                        <label for="NUP_Id" class="form-label">ID Pelanggan</label>
                        <input type="text" class="form-control" id="NUP_Id" name="NUP_Id" required>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" id="btnSubmit" class="btn btn-primary rounded-pill py-2 px-4">Cek
                        Keluhan</button>
                    <a href="{{ route('index') }}" class="btn btn-secondary rounded-pill py-2 px-4">Kembali</a>
                </div>
            </form>

            <!-- Tabel untuk Menampilkan Hasil -->
            <div class="table-responsive">
                <h5 class="mt-4">Daftar Keluhan:</h5>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pelanggan</th>
                            <th>Isi Keluhan</th>
                            <th>Teknisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($keluhans->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    @if (request()->has('NUP_Id'))
                                        Tidak ada keluhan untuk ID pelanggan ini.
                                    @else
                                        Silakan masukkan ID pelanggan untuk melihat keluhan.
                                    @endif
                                </td>
                            </tr>
                        @else
                            @foreach ($keluhans as $index => $keluhan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $keluhan->id_pelanggan }}</td>
                                    <td>{{ $keluhan->keluhan }}</td>
                                    <td>
                                        @if ($keluhan->teknisi->user->name)
                                            {{ $keluhan->teknisi->user->name }}
                                        @else
                                            <span class="text-muted">Belum Ditangani</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge
                                            @if ($keluhan->status === 'Pending') bg-warning text-dark
                                            @elseif($keluhan->status === 'Dalam Proses') bg-info
                                            @elseif($keluhan->status === 'Selesai') bg-success @endif">
                                            {{ $keluhan->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Form End -->

@endsection

@section('scripts')


@endsection
