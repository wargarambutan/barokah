@extends('layouts.admin')
@section('title', 'Laporan Karyawan')
@section('content')
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold"> Laporan Rekrutmen Karyawan </h2>
        <!-- Form untuk memilih bulan dan tahun -->
        <form action="{{ route('laporan') }}" method="GET" class="d-flex mb-4 justify-content-end">
            @csrf
            <div class="me-3">
                <label for="bulan" class="form-label">Pilih Bulan</label>
                <select name="bulan" id="bulan" class="form-select">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == $bulan ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="me-3">
                <label for="tahun" class="form-label">Pilih Tahun</label>
                <select name="tahun" id="tahun" class="form-select">
                    @for ($i = date('Y'); $i >= 2000; $i--)
                        <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

            <button type="submit" id="btnSubmit" class="btn btn-success btn-rounded mt-4 btn-sm">Tampilkan Laporan</button>
        </form>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables-laporan" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%;">NO.</th>
                                <th style="width: 30%;">Nama</th>
                                <th style="width: 25%;">Posisi yang dilamar</th>
                                <th style="width: 30%;">Email</th>
                                <th style="width: 10%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laporanKaryawan as $index => $karyawan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $karyawan->nama_lengkap }}</td>
                                    <td>{{ $karyawan->posisi_yang_dilamar }}</td>
                                    <td>{{ $karyawan->email }}</td>
                                    <td>{{ $karyawan->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data karyawan</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total Karyawan</strong></td>
                                <td><strong>{{ $laporanKaryawan->count() }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('cetak-laporan', ['status' => '', 'bulan' => $bulan, 'tahun' => $tahun]) }}"
                        class="btn btn-secondary btn-round btn-sm" target="_blank">Cetak Laporan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#basic-datatables-laporan").DataTable({
                pageLength: 10,
            });
        });
    </script>
@endsection
