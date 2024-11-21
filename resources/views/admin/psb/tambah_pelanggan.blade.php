@extends('layouts.admin')

@section('title', 'Tambah Data Pelanggan')

@section('content')
    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Tambah Data Pelanggan</h2>
        <a href="{{ route('psb-barokah.index') }}" class="btn btn-secondary btn-round">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('psb-barokah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama"
                            name="Nama" value="{{ old('Nama') }}" required>
                        @error('Nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Email_Address">Email</label>
                        <input type="email" class="form-control @error('Email_Address') is-invalid @enderror"
                            id="Email_Address" name="Email_Address" value="{{ old('Email_Address') }}" required>
                        @error('Email_Address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="NIK"
                            name="NIK" value="{{ old('NIK') }}" required>
                        @error('NIK')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="PPPoE">PPPoE</label>
                        <input type="text" class="form-control @error('PPPoE') is-invalid @enderror" id="PPPoE"
                            name="PPPoE" value="{{ old('PPPoE') }}" required>
                        @error('PPPoE')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Foto_KTP">Foto KTP</label>
                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                        <input type="file" class="form-control @error('Foto_KTP') is-invalid @enderror" id="Foto_KTP"
                            name="Foto_KTP">
                        @error('Foto_KTP')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Tapak_Depan_Rumah">Foto Tapak Depan Rumah</label>
                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                        <input type="file" class="form-control @error('Tapak_Depan_Rumah') is-invalid @enderror"
                            id="Tapak_Depan_Rumah" name="Tapak_Depan_Rumah">
                        @error('Tapak_Depan_Rumah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Tempat_Lahir">Tempat Lahir</label>
                        <input type="text" class="form-control @error('Tempat_Lahir') is-invalid @enderror"
                            id="Tempat_Lahir" name="Tempat_Lahir" value="{{ old('Tempat_Lahir') }}" required>
                        @error('Tempat_Lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('Tanggal_Lahir') is-invalid @enderror"
                            id="Tanggal_Lahir" name="Tanggal_Lahir" value="{{ old('Tanggal_Lahir') }}" required>
                        @error('Tanggal_Lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('Kelamin') is-invalid @enderror" id="Kelamin" name="Kelamin"
                            required>
                            <option value="L" {{ old('Kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('Kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('Kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Dusun">Dusun</label>
                        <input type="text" class="form-control @error('Dusun') is-invalid @enderror" id="Dusun"
                            name="Dusun" value="{{ old('Dusun') }}" required>
                        @error('Dusun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="RT_RW">RT / RW</label>
                        <input type="text" class="form-control @error('RT_RW') is-invalid @enderror" id="RT_RW"
                            name="RT_RW" value="{{ old('RT_RW') }}" required>
                        @error('RT_RW')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kel_Desa">Kelurahan / Desa</label>
                        <input type="text" class="form-control @error('Kel_Desa') is-invalid @enderror"
                            id="Kel_Desa" name="Kel_Desa" value="{{ old('Kel_Desa') }}" required>
                        @error('Kel_Desa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kecamatan">Kecamatan</label>
                        <input type="text" class="form-control @error('Kecamatan') is-invalid @enderror"
                            id="Kecamatan" name="Kecamatan" value="{{ old('Kecamatan') }}" required>
                        @error('Kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kabupaten_Kota">Kabupaten / Kota</label>
                        <input type="text" class="form-control @error('Kabupaten_Kota') is-invalid @enderror"
                            id="Kabupaten_Kota" name="Kabupaten_Kota" value="{{ old('Kabupaten_Kota') }}" required>
                        @error('Kabupaten_Kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Paket">Paket</label>
                        <input type="text" class="form-control @error('Paket') is-invalid @enderror" id="Paket"
                            name="Paket" value="{{ old('Paket') }}" required>
                        @error('Paket')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="No_WA">No WA</label>
                        <input type="text" class="form-control @error('No_WA') is-invalid @enderror" id="No_WA"
                            name="No_WA" value="{{ old('No_WA') }}" required>
                        @error('No_WA')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Keterangan">Keterangan</label>
                        <textarea class="form-control @error('Keterangan') is-invalid @enderror" id="Keterangan" name="Keterangan"
                            rows="3">{{ old('Keterangan') }}</textarea>
                        @error('Keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Koordinat_ONT">Koordinat ONT</label>
                        <input type="text" class="form-control @error('Koordinat_ONT') is-invalid @enderror"
                            id="Koordinat_ONT" name="Koordinat_ONT" value="{{ old('Koordinat_ONT') }}" required>
                        @error('Koordinat_ONT')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Tenaga_Ahli">Tenaga Ahli</label>
                        <input type="text" class="form-control @error('Tenaga_Ahli') is-invalid @enderror"
                            id="Tenaga_Ahli" name="Tenaga_Ahli" value="{{ old('Tenaga_Ahli') }}" required>
                        @error('Tenaga_Ahli')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-primary btn-round">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
