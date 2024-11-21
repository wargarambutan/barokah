@extends('layouts.admin')
@section('title', 'PSB Barokah')
@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Data Pelanggan</h3>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                        <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                        </span>
                        Import
                    </a>
                    <a href="{{ route('psb-barokah.create') }}" class="btn btn-primary btn-round btn-sm ms-auto">
                        <i class="fa fa-plus"></i>
                        Tambah Pelanggan
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="pelanggan" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th style="width: 15%;">NUP ID</th>
                                <th style="width: 20%;">Nama</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 20%;">PPPoE</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->NUP_Id }}</td>
                                    <td>{{ $data->Nama }}</td>
                                    <td>{{ $data->Email_Address }}</td>
                                    <td>{{ $data->PPPoE }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-cogs"></i> <span class="d-none d-sm-inline">Opsi</span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('psb-barokah.show', $data->id) }}" title="Detail">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('psb-barokah.edit', $data->id) }}" title="Edit">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form id="delete-form-{{ $data->id }}"
                                                        action="{{ route('psb-barokah.destroy', $data->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item text-danger"
                                                            id="delete-button-{{ $data->id }}" title="Hapus">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            @if ($pelanggan->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data pelanggan</td>
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
                // Cek apakah tombol yang diklik adalah tombol hapus yang tepat
                if (event.target && event.target.id.startsWith('delete-button-')) {
                    event.preventDefault(); // Mencegah form dikirim langsung

                    // Ambil ID dari tombol yang diklik
                    var id = event.target.id.split('-')[2];

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
                            // Kirim form untuk menghapus data yang tepat berdasarkan ID
                            document.getElementById('delete-form-' + id).submit();
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
            $("#pelanggan").DataTable({
                pageLength: 10,
            });
        });
    </script>
@endsection
