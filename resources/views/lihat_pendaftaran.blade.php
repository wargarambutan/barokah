@extends('layouts.app')

@section('title', 'Lihat Pendaftaran')

@section('content')


    <!-- Lihat Pendaftaran Start -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <!-- Bagian Kanan: Data Karyawan -->
            <div class="col-md-8">
                <h1 class="display-6 mb-4">Detail Data Pendaftaran Karyawan</h1>
                <!-- Tombol Kembali -->
                <button type="button" class="btn btn-secondary mb-4 btn-round btn-sm" onclick="goBack()">
                    <i class="bi bi-arrow-left"></i> Kembali
                </button>

                <form>
                    <div class="row mb-4">
                        <div class="col-12 text-center mb-4">
                            <!-- Foto Karyawan di Atas Form -->
                            @if ($pendaftaran->foto_karyawan)
                                <img src="{{ asset('storage/' . $pendaftaran->foto_karyawan) }}" class="img-fluid"
                                    alt="Foto Karyawan" style="width: 350px; border-radius: 10px;">
                            @else
                                <p>Foto Karyawan Tidak diupload.</p>
                            @endif
                        </div>
                        <div class="col-12">
                            <!-- Data Pendaftaran -->
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap"
                                        value="{{ $pendaftaran->nama_lengkap ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik"
                                        value="{{ $pendaftaran->nomor_ktp ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir"
                                        value="{{ $pendaftaran->tempat_lahir ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tanggal_lahir"
                                        value="{{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir ?: 'Data Tidak Diisi')->format('d-m-Y') }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenis_kelamin"
                                        value="{{ $pendaftaran->jenis_kelamin ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor_telepon"
                                        value="{{ $pendaftaran->nomor_telepon ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        value="{{ $pendaftaran->email }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat_lengkap"
                                        value="{{ $pendaftaran->alamat_lengkap ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pendidikan_terakhir"
                                        value="{{ $pendaftaran->pendidikan_terakhir ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan"
                                        value="{{ $pendaftaran->jurusan ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama_institusi" class="form-label">Nama Institusi</label>
                                    <input type="text" class="form-control" id="nama_institusi"
                                        value="{{ $pendaftaran->nama_institusi ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                    <input type="text" class="form-control" id="tahun_lulus"
                                        value="{{ $pendaftaran->tahun_lulus ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="posisi_terakhir" class="form-label">Posisi Terakhir</label>
                                    <input type="text" class="form-control" id="posisi_terakhir"
                                        value="{{ $pendaftaran->posisi_terakhir ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama_perusahaan_terakhir" class="form-label">Nama Perusahaan
                                        Terakhir</label>
                                    <input type="text" class="form-control" id="nama_perusahaan_terakhir"
                                        value="{{ $pendaftaran->nama_perusahaan_terakhir ?: 'Data Tidak Diisi' }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="lama_bekerja" class="form-label">Lama Bekerja</label>
                                    <input type="text" class="form-control" id="lama_bekerja"
                                        value="{{ $pendaftaran->lama_bekerja ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                                    <textarea class="form-control" id="deskripsi_pekerjaan" rows="3" readonly>{{ $pendaftaran->deskripsi_pekerjaan ?: 'Data Tidak Diisi' }}</textarea>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="posisi_yang_dilamar" class="form-label">Posisi yang Dilamar</label>
                                    <input type="text" class="form-control" id="posisi_yang_dilamar"
                                        value="{{ $pendaftaran->posisi_yang_dilamar ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="keahlian_khusus" class="form-label">Keahlian Khusus</label>
                                    <input type="text" class="form-control" id="keahlian_khusus"
                                        value="{{ $pendaftaran->keahlian_khusus ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                                    <input type="text" class="form-control" id="tanggal_pendaftaran"
                                        value="{{ \Carbon\Carbon::parse($pendaftaran->created_at)->format('d-m-Y') }}"
                                        readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="alert alert-warning mt-2">
                                        <strong>Penting!</strong> Mohon cek email secara berkala untuk informasi
                                        selengkapnya.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- Lihat Pendaftaran End -->

@endsection

@section('scripts')

    <script>
        function goBack() {
            // Ambil NIK dan Email dari elemen yang sesuai (misalnya dari hidden field atau variabel)
            var nik = "{{ $pendaftaran->nomor_ktp }}"; // Gantilah dengan variabel yang sesuai
            var email = "{{ $pendaftaran->email }}"; // Gantilah dengan variabel yang sesuai

            // Mengarahkan ke route cek-pendaftaran dengan parameter nik dan email
            window.location.href = "/cek-pendaftaran?nik=" + nik + "&email=" + email;
        }
    </script>

@endsection
