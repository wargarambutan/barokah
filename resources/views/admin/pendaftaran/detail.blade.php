@extends('layouts.admin')
@section('title', 'Detail Karyawan')
@section('content')
    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Detail Karyawan Menunggu Verifikasi</h2>
        <a href="{{ route('verifikasi') }}" class="btn btn-secondary btn-round">Kembali</a>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row mb-4">
                        <div class="col-12 text-center mb-4">
                            <!-- Foto Karyawan di Atas Form -->
                            @if ($karyawan->foto_karyawan)
                                <img src="{{ asset('storage/' . $karyawan->foto_karyawan) }}" class="img-fluid"
                                    alt="Foto Karyawan" style="width: 350px; border-radius: 10px;">
                            @else
                                <p>Foto Karyawan belum diupload.</p>
                            @endif
                        </div>

                        <div class="col-12">
                            <!-- Data Pendaftaran -->
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap"
                                        value="{{ $karyawan->nama_lengkap }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik"
                                        value="{{ $karyawan->nomor_ktp }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir"
                                        value="{{ $karyawan->tempat_lahir }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tanggal_lahir"
                                        value="{{ \Carbon\Carbon::parse($karyawan->tanggal_lahir)->format('d-m-Y') }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenis_kelamin"
                                        value="{{ $karyawan->jenis_kelamin }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor_telepon"
                                        value="{{ $karyawan->nomor_telepon }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $karyawan->email }}"
                                        readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat_lengkap"
                                        value="{{ $karyawan->alamat_lengkap }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pendidikan_terakhir"
                                        value="{{ $karyawan->pendidikan_terakhir ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan"
                                        value="{{ $karyawan->jurusan ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama_institusi" class="form-label">Nama Institusi</label>
                                    <input type="text" class="form-control" id="nama_institusi"
                                        value="{{ $karyawan->nama_institusi ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                    <input type="text" class="form-control" id="tahun_lulus"
                                        value="{{ $karyawan->tahun_lulus ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="posisi_terakhir" class="form-label">Posisi Terakhir</label>
                                    <input type="text" class="form-control" id="posisi_terakhir"
                                        value="{{ $karyawan->posisi_terakhir ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama_perusahaan_terakhir" class="form-label">Nama Perusahaan
                                        Terakhir</label>
                                    <input type="text" class="form-control" id="nama_perusahaan_terakhir"
                                        value="{{ $karyawan->nama_perusahaan_terakhir ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="lama_bekerja" class="form-label">Lama Bekerja</label>
                                    <input type="text" class="form-control" id="lama_bekerja"
                                        value="{{ $karyawan->lama_bekerja ?: 'Data Tidak Diisi' }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                                    <textarea class="form-control" id="deskripsi_pekerjaan" rows="3" readonly>{{ $karyawan->deskripsi_pekerjaan ?: 'Data Tidak Diisi' }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="posisi_yang_dilamar" class="form-label">Posisi yang Dilamar</label>
                                    <input type="text" class="form-control" id="posisi_yang_dilamar"
                                        value="{{ $karyawan->posisi_yang_dilamar }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="keahlian_khusus" class="form-label">Keahlian Khusus</label>
                                    <input type="text" class="form-control" id="keahlian_khusus"
                                        value="{{ $karyawan->keahlian_khusus }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                                    <input type="text" class="form-control" id="tanggal_pendaftaran"
                                        value="{{ \Carbon\Carbon::parse($karyawan->created_at)->format('d-m-Y') }}"
                                        readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="status"
                                        value="{{ $karyawan->status }}" readonly>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 text-end">
                                    <!-- Tombol Status Verifikasi -->
                                    <button class="btn btn-primary btn-rounded" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Ubah Status
                                    </button>
                                    <ul class="dropdown-menu" id="statusDropdown">
                                        <li><a class="dropdown-item" href="#"
                                                data-status="Menunggu Verifikasi">Menunggu
                                                Verifikasi</a></li>
                                        <li><a class="dropdown-item" href="#" data-status="Diterima">Diterima</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" data-status="Ditolak">Ditolak</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection

@section('script')
    <script>
        // Event listener untuk klik pada item dropdown
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function() {
                // Ambil status yang dipilih
                let status = this.getAttribute('data-status');
                let karyawanId = "{{ $karyawan->id }}"; // ID Karyawan yang sedang dilihat

                // Kirim request untuk mengubah status menggunakan AJAX
                fetch(`/karyawan/${karyawanId}/update-status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan CSRF Token ada
                        },
                        body: JSON.stringify({
                            status: status
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Your work has been saved",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            // Tunggu 2 detik sebelum reload halaman
                            setTimeout(() => {
                                location
                                    .reload(); // Reload halaman untuk menampilkan status terbaru
                            }, 1300); // 2000 ms = 2 detik
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                            });
                        }
                    });
            });
        });

        // Event listener untuk setiap item di dropdown
        // document.querySelectorAll('#statusDropdown .dropdown-item').forEach(item => {
        //     item.addEventListener('click', function(event) {
        //         event.preventDefault(); // Mencegah reload atau navigasi halaman

        //         // Ambil nilai status dari data attribute
        //         const status = this.getAttribute('data-status');

        //         // Panggil SweetAlert saat tombol diklik
        //         Swal.fire({
        //             title: "Status Diubah!",
        //             text: `Status berhasil diubah menjadi ${status}.`,
        //             icon: "success",
        //             confirmButtonText: "OK"
        //         });
        //     });
        // });
    </script>

@endsection
