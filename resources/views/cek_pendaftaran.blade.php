@extends('layouts.app')

@section('title', 'Cek Pendaftaran')

@section('content')


    <!-- Form Start -->
    <div class="container-fluid full-page">
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="display-6 mb-4">Cek Pendaftaran</h1>

            <form action="{{ route('cek-pendaftaran') }}" method="GET">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" id="btnSubmit" class="btn btn-primary rounded-pill py-2 px-4">Cek
                        Pendaftaran</button>
                    <a href="{{ route('pendaftaran-karyawan') }}"
                        class="btn btn-secondary rounded-pill py-2 px-4">Kembali</a>
                </div>
            </form>

            <!-- Tabel untuk Menampilkan Hasil -->
            <div class="table-responsive">
                <h5 class="mt-4">Hasil Pendaftaran:</h5>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Posisi yang Dilamar</th>
                            <th>Dokumen Pendukung</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pendaftarans->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pendaftaran yang ditemukan.</td>
                            </tr>
                        @else
                            @foreach ($pendaftarans as $index => $pendaftaran)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pendaftaran->nama_lengkap }}</td>
                                    <td>{{ $pendaftaran->posisi_yang_dilamar }}</td>
                                    <td>
                                        <!-- Tombol Lihat Foto KTP -->
                                        @if ($pendaftaran->foto_ktp)
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewKTPModal{{ $pendaftaran->id }}">KTP</button>
                                            <!-- Modal untuk Foto KTP -->
                                            <div class="modal fade" id="viewKTPModal{{ $pendaftaran->id }}" tabindex="-1"
                                                aria-labelledby="viewKTPLabel{{ $pendaftaran->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewKTPLabel{{ $pendaftaran->id }}">
                                                                Foto KTP</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div
                                                            class="modal-body modal-body d-flex justify-content-center align-items-center">
                                                            @if (pathinfo($pendaftaran->foto_ktp, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed
                                                                    src="{{ asset('storage/' . $pendaftaran->foto_ktp) }}"
                                                                    type="application/pdf" width="100%" height="700px" />
                                                            @else
                                                                <img id="ktpImage{{ $pendaftaran->id }}"
                                                                    src="{{ asset('storage/' . $pendaftaran->foto_ktp) }}"
                                                                    style="width: 100%; height: auto; transition: transform 0.3s ease-in-out;"
                                                                    alt="Foto KTP">
                                                            @endif
                                                        </div>
                                                        <button type="button" class="btn btn-secondary mt-3"
                                                            id="rotateButton{{ $pendaftaran->id }}">Putar
                                                            Gambar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Tombol Lihat Sertifikat -->
                                        @if ($pendaftaran->sertifikat)
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewSertifikatModal{{ $pendaftaran->id }}">Sertifikat</button>
                                            <!-- Modal untuk Sertifikat -->
                                            <div class="modal fade" id="viewSertifikatModal{{ $pendaftaran->id }}"
                                                tabindex="-1" aria-labelledby="viewSertifikatLabel{{ $pendaftaran->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="viewSertifikatLabel{{ $pendaftaran->id }}">Sertifikat
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div
                                                            class="modal-body d-flex justify-content-center align-items-center">
                                                            @if (pathinfo($pendaftaran->sertifikat, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed
                                                                    src="{{ asset('storage/' . $pendaftaran->sertifikat) }}"
                                                                    type="application/pdf" width="100%" height="600px" />
                                                            @else
                                                                <img id="sertifikatImage{{ $pendaftaran->id }}"
                                                                    src="{{ asset('storage/' . $pendaftaran->sertifikat) }}"
                                                                    style="width: 100%; height: auto; transition: transform 0.3s ease-in-out;"
                                                                    alt="Sertifikat">
                                                            @endif
                                                        </div>
                                                        <button type="button" class="btn btn-secondary mt-3"
                                                            id="rotateButtonSertifikat{{ $pendaftaran->id }}">Putar
                                                            Gambar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Tombol Lihat CV -->
                                        @if ($pendaftaran->unggah_cv)
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewCVModal{{ $pendaftaran->id }}">CV</button>
                                            <!-- Modal untuk CV -->
                                            <div class="modal fade" id="viewCVModal{{ $pendaftaran->id }}" tabindex="-1"
                                                aria-labelledby="viewCVLabel{{ $pendaftaran->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="viewCVLabel{{ $pendaftaran->id }}">CV</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if (pathinfo($pendaftaran->unggah_cv, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed
                                                                    src="{{ asset('storage/' . $pendaftaran->unggah_cv) }}"
                                                                    type="application/pdf" width="100%"
                                                                    height="600px" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Tombol Lihat Ijazah -->
                                        @if ($pendaftaran->ijazah)
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewIjazahModal{{ $pendaftaran->id }}">Ijazah</button>
                                            <!-- Modal untuk Ijazah -->
                                            <div class="modal fade" id="viewIjazahModal{{ $pendaftaran->id }}"
                                                tabindex="-1" aria-labelledby="viewIjazahLabel{{ $pendaftaran->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="viewIjazahLabel{{ $pendaftaran->id }}">Ijazah</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div
                                                            class="modal-body d-flex justify-content-center align-items-center">
                                                            @if (pathinfo($pendaftaran->ijazah, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed
                                                                    src="{{ asset('storage/' . $pendaftaran->ijazah) }}"
                                                                    type="application/pdf" width="100%"
                                                                    height="600px" />
                                                            @else
                                                                <img id="ijazahImage{{ $pendaftaran->id }}"
                                                                    src="{{ asset('storage/' . $pendaftaran->ijazah) }}"
                                                                    style="width: 100%; height: auto; transition: transform 0.3s ease-in-out;"
                                                                    alt="Ijazah">
                                                            @endif
                                                        </div>
                                                        <button type="button" class="btn btn-secondary mt-3"
                                                            id="rotateButtonIjazah{{ $pendaftaran->id }}">Putar
                                                            Gambar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pendaftaran->status === 'Menunggu Verifikasi')
                                            <span class="badge bg-warning text-dark">{{ $pendaftaran->status }}</span>
                                        @elseif($pendaftaran->status === 'Diterima')
                                            <span class="badge bg-success">{{ $pendaftaran->status }}</span>
                                        @elseif($pendaftaran->status === 'Ditolak')
                                            <span class="badge bg-danger">{{ $pendaftaran->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Tombol Lihat Detail -->
                                        <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Lihat Detail
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <!-- Form Hapus dengan Input Hidden -->
                                        <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}"
                                            method="POST" class="delete-form" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Input tersembunyi untuk membawa nilai NIK dan email -->
                                            <input type="hidden" name="email" value="{{ request('email') }}">
                                            <input type="hidden" name="nik" value="{{ request('nik') }}">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>


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

    <script>
        // Menangani penghapusan form dengan SweetAlert2
        document.querySelectorAll('.delete-form').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah form submit langsung

                // Menampilkan konfirmasi sebelum penghapusan
                Swal.fire({
                    title: "Apa kamu yakin?",
                    text: "Data ini tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim form jika konfirmasi diterima
                        form.submit();
                    }
                });
            });
        });
    </script>

    <script>
        // Fungsi untuk memutar gambar
        function rotateImage(imageId, buttonId) {
            let rotationDegree = 0;
            document.getElementById(buttonId).addEventListener('click', function() {
                let image = document.getElementById(imageId);
                rotationDegree += 90; // Setiap klik memutar gambar 90 derajat
                if (rotationDegree >= 360) rotationDegree = 0; // Reset rotasi jika sudah 360 derajat
                image.style.transform = `rotate(${rotationDegree}deg)`;
            });
        }

        // Panggil fungsi rotate untuk masing-masing modal
        @foreach ($pendaftarans as $pendaftaran)
            rotateImage('ktpImage{{ $pendaftaran->id }}', 'rotateButton{{ $pendaftaran->id }}');
            rotateImage('sertifikatImage{{ $pendaftaran->id }}', 'rotateButtonSertifikat{{ $pendaftaran->id }}');
            rotateImage('ijazahImage{{ $pendaftaran->id }}', 'rotateButtonIjazah{{ $pendaftaran->id }}');
        @endforeach
    </script>

@endsection
