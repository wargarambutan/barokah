@extends('layouts.teknisi')
@section('title', 'Daftar Keluhan')
@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Daftar Keluhan</h3>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="keluhan" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%"">NO.</th>
                                <th style="width: 12%;">ID Pelanggan</th>
                                <th style="width: 15%;">PPPoE</th>
                                <th style="width: 35%;">Keluhan</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 11%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keluhan as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->id_pelanggan }}</td>
                                    <td>{{ $data->pelanggan->PPPoE }}</td>
                                    <td>{{ $data->keluhan }}</td>
                                    <td>
                                        <span
                                            class="badge
                                            @if ($data->status == 'Pending') bg-warning
                                            @elseif($data->status == 'Selesai')
                                                bg-success
                                            @elseif($data->status == 'Dalam Proses')
                                                bg-primary
                                            @else
                                                bg-secondary @endif">
                                            {{ $data->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-round btn-sm btn-primary" href="">Ambil Tugas</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($keluhan->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data karyawan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    @if (session('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Delegasi event untuk tombol hapus
            document.body.addEventListener('click', function(event) {
                if (event.target && event.target.id === 'delete-button') {
                    event.preventDefault(); // Mencegah form dikirim langsung

                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Anda tidak akan bisa mengembalikannya setelah dihapus!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim form untuk menghapus data
                            document.getElementById('delete-form').submit();
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
            // Add Row
            $("#keluhan").DataTable({
                pageLength: 10,
            });
        });
    </script>
@endsection
