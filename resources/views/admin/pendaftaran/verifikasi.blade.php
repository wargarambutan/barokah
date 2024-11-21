@extends('layouts.admin')
@section('title', 'Menunggu Verifikasi')
@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Menunggu Verifikasi</h3>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%;">NO.</th>
                                <th style="width: 20%;">Nama</th>
                                <th style="width: 15%;">Posisi</th>
                                <th style="width: 18%;">Dokumen Pendukung</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($karyawanMenunggu as $index => $karyawan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $karyawan->nama_lengkap }}</td>
                                    <td>{{ $karyawan->posisi_yang_dilamar }}</td>
                                    <td>
                                        <!-- Tombol Lihat Foto KTP -->
                                        @if ($karyawan->foto_ktp)
                                            <button class="btn btn-link btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewKTPModal{{ $karyawan->id }}" data-bs-toggle="tooltip"
                                                title="Lihat KTP">
                                                <i class="fa fa-id-card fa-2x"></i>
                                            </button>
                                            <!-- Modal untuk Foto KTP -->
                                            <div class="modal fade" id="viewKTPModal{{ $karyawan->id }}" tabindex="-1"
                                                aria-labelledby="viewKTPLabel{{ $karyawan->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" style="width: 50%; !important;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewKTPLabel{{ $karyawan->id }}">
                                                                Foto KTP</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div
                                                            class="modal-body d-flex justify-content-center align-items-center">
                                                            @if (pathinfo($karyawan->foto_ktp, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed src="{{ asset('storage/' . $karyawan->foto_ktp) }}"
                                                                    type="application/pdf" width="100%" height="700px" />
                                                            @else
                                                                <img id="ktpImage{{ $karyawan->id }}"
                                                                    src="{{ asset('storage/' . $karyawan->foto_ktp) }}"
                                                                    style="width: 80%; height: auto; border-radius: 0 !important;"
                                                                    alt="Foto KTP">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Tombol Lihat Sertifikat -->
                                        @if ($karyawan->sertifikat)
                                            <button class="btn btn-link btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewSertifikatModal{{ $karyawan->id }}"
                                                data-bs-toggle="tooltip" title="Lihat Sertifikat">
                                                <i class="fa fa-file fa-2x"></i>
                                            </button>
                                            <!-- Modal untuk Sertifikat -->
                                            <div class="modal fade" id="viewSertifikatModal{{ $karyawan->id }}"
                                                tabindex="-1" aria-labelledby="viewSertifikatLabel{{ $karyawan->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" style="width: 50%; !important;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="viewSertifikatLabel{{ $karyawan->id }}">
                                                                Sertifikat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div
                                                            class="modal-body d-flex justify-content-center align-items-center">
                                                            @if (pathinfo($karyawan->sertifikat, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed
                                                                    src="{{ asset('storage/' . $karyawan->sertifikat) }}"
                                                                    type="application/pdf" width="40%" height="600px" />
                                                            @else
                                                                <img id="sertifikatImage{{ $karyawan->id }}"
                                                                    src="{{ asset('storage/' . $karyawan->sertifikat) }}"
                                                                    style="width: 100%; height: auto; border-radius: 0 !important;"
                                                                    alt="Sertifikat">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Tombol Lihat CV -->
                                        @if ($karyawan->unggah_cv)
                                            <button class="btn btn-link btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewCVModal{{ $karyawan->id }}" data-bs-toggle="tooltip"
                                                title="Lihat CV">
                                                <i class="fa fa-file-alt fa-2x"></i>
                                            </button>
                                            <!-- Modal untuk CV -->
                                            <div class="modal fade" id="viewCVModal{{ $karyawan->id }}" tabindex="-1"
                                                aria-labelledby="viewCVLabel{{ $karyawan->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" style="width: 50%; !important;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewCVLabel{{ $karyawan->id }}">CV
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if (pathinfo($karyawan->unggah_cv, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed src="{{ asset('storage/' . $karyawan->unggah_cv) }}"
                                                                    type="application/pdf" width="100%" height="600px" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Tombol Lihat Ijazah -->
                                        @if ($karyawan->ijazah)
                                            <button class="btn btn-link btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewIjazahModal{{ $karyawan->id }}"
                                                data-bs-toggle="tooltip" title="Lihat Ijazah">
                                                <i class="fa fa-certificate fa-2x"></i>
                                            </button>
                                            <!-- Modal untuk Ijazah -->
                                            <div class="modal fade" id="viewIjazahModal{{ $karyawan->id }}"
                                                tabindex="-1" aria-labelledby="viewIjazahLabel{{ $karyawan->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" style="width: 50%; !important;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="viewIjazahLabel{{ $karyawan->id }}">Ijazah</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div
                                                            class="modal-body d-flex justify-content-center align-items-center">
                                                            @if (pathinfo($karyawan->ijazah, PATHINFO_EXTENSION) === 'pdf')
                                                                <embed src="{{ asset('storage/' . $karyawan->ijazah) }}"
                                                                    type="application/pdf" width="40%"
                                                                    height="600px" />
                                                            @else
                                                                <img id="ijazahImage{{ $karyawan->id }}"
                                                                    src="{{ asset('storage/' . $karyawan->ijazah) }}"
                                                                    style="width: 80%; height: auto; border-radius: 0 !important;"
                                                                    alt="Ijazah">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Tombol Lihat Detail dengan Ikon -->
                                        <a href="{{ route('karyawan.detail', $karyawan->id) }}"
                                            class="btn btn-link btn-success btn-sm" data-bs-toggle="tooltip"
                                            title="Lihat Detail">
                                            <i class="fa fa-eye fa-2x"></i>
                                        </a>

                                        <!-- Tombol Hapus dengan Ikon -->
                                        <form action="{{ route('karyawan.hapus', $karyawan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data?')"
                                                data-bs-toggle="tooltip" title="Hapus">
                                                <i class="fa fa-times fa-2x"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada karyawan yang menunggu verifikasi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    @if ($karyawanMenunggu->isNotEmpty())
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
            @foreach ($karyawanMenunggu as $karyawan)
                rotateImage('ktpImage{{ $karyawan->id }}', 'rotateButton{{ $karyawan->id }}');
                rotateImage('sertifikatImage{{ $karyawan->id }}', 'rotateButtonSertifikat{{ $karyawan->id }}');
                rotateImage('ijazahImage{{ $karyawan->id }}', 'rotateButtonIjazah{{ $karyawan->id }}');
            @endforeach
        </script>

        <script>
            $('#viewKTPModal{{ $karyawan->id }}').on('shown.bs.modal', function() {
                var img = $('#ktpImage{{ $karyawan->id }}');
                var modalDialog = $(this).find('.modal-dialog');

                // Mendapatkan ukuran gambar
                var imgWidth = img[0].naturalWidth; // Lebar asli gambar
                var imgHeight = img[0].naturalHeight; // Tinggi asli gambar

                // Menyesuaikan ukuran modal dengan ukuran gambar
                modalDialog.css('max-width', imgWidth + 'px'); // Menyesuaikan lebar modal dengan gambar
                modalDialog.css('max-height', imgHeight + 'px'); // Menyesuaikan tinggi modal dengan gambar
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
            // Add Row
            $("#add-row").DataTable({
                pageLength: 10,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
        });
    </script>
@endsection
