@extends('layouts.app')

@section('title', 'Pendaftaran Karyawan')

@section('content')

    <!-- Form Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h1 class="display-6 mb-2">Bergabunglah Sekarang dan Raih Kesempatan Kerja!</h1>
                        <div class="col-6 mt-0">
                            <a href="{{ route('cek-pendaftaran') }}" class="btn btn-secondary rounded-pill py-2 px-4">Cek
                                Pendaftaran</a>
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
                        <!-- Pesan alert jika pendaftaran ditutup -->
                        @if ($pendaftaranTutup)
                            <div class="alert alert-warning mt-4">
                                Pendaftaran sedang ditutup. Anda tidak dapat mengisi formulir ini.
                            </div>
                        @endif

                        <form action="{{ route('pendaftaran-karyawan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Data Pribadi -->
                            <h5 class="mt-4">Data Pribadi:</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                        required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap"
                                        required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomor_ktp" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" required
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                            </div>

                            <!-- Informasi Pendidikan -->
                            <h5 class="mt-4">Informasi Pendidikan:</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir <small>(Boleh
                                            Dikosongkan)</small></label>
                                    <select class="form-select" id="pendidikan_terakhir" name="pendidikan_terakhir"
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                        <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="jurusan" class="form-label">Jurusan <small>(Boleh
                                            Dikosongkan)</small></label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan"
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_institusi" class="form-label">Nama Institusi <small>(Boleh
                                            Dikosongkan)</small></label>
                                    <input type="text" class="form-control" id="nama_institusi" name="nama_institusi"
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="tahun_lulus" class="form-label">Tahun Lulus <small>(Boleh
                                            Dikosongkan)</small></label>
                                    <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus"
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                            </div>

                            <!-- Pengalaman Kerja -->
                            <h5 class="mt-4">Pengalaman Kerja:</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="posisi_terakhir" class="form-label">Posisi Terakhir <small>(Boleh
                                            Dikosongkan)</small></label>
                                    <input type="text" class="form-control" id="posisi_terakhir"
                                        name="posisi_terakhir" {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_perusahaan_terakhir" class="form-label">Nama Perusahaan
                                        Terakhir <small>(Boleh Dikosongkan)</small></label>
                                    <input type="text" class="form-control" id="nama_perusahaan_terakhir"
                                        name="nama_perusahaan_terakhir" {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="lama_bekerja" class="form-label">Lama Bekerja <small>(Boleh
                                            Dikosongkan)</small></label>
                                    <input type="text" class="form-control" id="lama_bekerja" name="lama_bekerja"
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan <small>(Boleh
                                            Dikosongkan)</small></label>
                                    <textarea class="form-control" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan"
                                        {{ $pendaftaranTutup ? 'disabled' : '' }}></textarea>
                                </div>
                            </div>
                            <!-- Informasi Tambahan -->
                            <h5 class="mt-4">Informasi Tambahan:</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="posisi_yang_dilamar" class="form-label">Posisi yang Dilamar</label>
                                    <input type="text" class="form-control" id="posisi_yang_dilamar"
                                        name="posisi_yang_dilamar" required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="keahlian_khusus" class="form-label">Keahlian Khusus/Skill</label>
                                    <input type="text" class="form-control" id="keahlian_khusus"
                                        name="keahlian_khusus" required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                            </div>

                            <!-- Dokumen Pendukung -->
                            <h5 class="mt-4">Dokumen Pendukung:</h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="foto_ktp" class="form-label">Foto KTP <small>(Ukuran file maksimal
                                            500KB)</small></label>
                                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp"
                                        accept="image/*" required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="foto_karyawan" class="form-label">Pas Foto <small>(Ukuran file
                                            maksimal
                                            500KB)</small></label>
                                    <input type="file" class="form-control" id="foto_karyawan" name="foto_karyawan"
                                        accept="image/*" required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="unggah_cv" class="form-label">Unggah CV <small>(Ukuran file maksimal
                                            500KB)</small></label>
                                    <input type="file" class="form-control" id="unggah_cv" name="unggah_cv"
                                        accept=".pdf" required {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="ijazah" class="form-label">Ijazah Terakhir <small>(Ukuran file
                                            maksimal 500KB)</small></label>
                                    <input type="file" class="form-control" id="ijazah" name="ijazah"
                                        accept="image/*,.pdf" {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <label for="sertifikat" class="form-label">Sertifikat (opsional) <small>(Ukuran
                                            file maksimal 500KB)</small></label>
                                    <input type="file" class="form-control" id="sertifikat" name="sertifikat"
                                        accept="image/*,.pdf" {{ $pendaftaranTutup ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="alert alert-warning">
                                        <strong>Penting!</strong> Pastikan data yang Anda masukkan sudah benar dan sesuai.
                                        Perubahan data tidak dapat dilakukan setelah disubmit.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" id="btnSubmit" class="btn btn-primary rounded-pill py-2 px-4"
                                    {{ $pendaftaranTutup ? 'disabled' : '' }}>Daftar</button>
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
