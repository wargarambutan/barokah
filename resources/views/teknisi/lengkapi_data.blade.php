@extends('layouts.teknisi')
@section('title', 'Edit Keluhan')
@section('content')

    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Tambah Data Pelanggan</h2>
        <a href="{{ route('keluhan') }}" class="btn btn-secondary btn-round">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('keluhan.update', $keluhan->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="keluhan">Keluhan Customer</label>
                        <textarea class="form-control" id="keluhan" name="keluhan" rows="1" required>{{ old('keluhan', $keluhan->keluhan) }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Pending" {{ $keluhan->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Dalam Proses" {{ $keluhan->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam
                                Proses
                            </option>
                            <option value="Selesai" {{ $keluhan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_gangguan">Jenis Gangguan</label>
                        <textarea class="form-control" id="jenis_gangguan" name="jenis_gangguan" rows="1">{{ old('jenis_gangguan', $keluhan->jenis_gangguan) }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bentuk_tindakan">Bentuk Tindakan</label>
                        <textarea class="form-control" id="bentuk_tindakan" name="bentuk_tindakan" rows="1">{{ old('bentuk_tindakan', $keluhan->bentuk_tindakan) }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
