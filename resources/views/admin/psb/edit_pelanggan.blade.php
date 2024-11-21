@extends('layouts.admin')

@section('title', 'Edit Data Pelanggan')

@section('content')
    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Edit Data Pelanggan</h2>
        <a href="{{ route('psb-barokah.index') }}" class="btn btn-secondary btn-rounded">
            <i class="fa fa-arrow-left btn-round"></i> Kembali
        </a>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('psb-barokah.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama"
                            name="Nama" value="{{ old('Nama', $pelanggan->Nama ?: 'Data Belum Diisi') }}" required>
                        @error('Nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Email_Address">Email</label>
                        <input type="email" class="form-control @error('Email_Address') is-invalid @enderror"
                            id="Email_Address" name="Email_Address"
                            value="{{ old('Email_Address', $pelanggan->Email_Address ?: 'Data Belum Diisi') }}" required>
                        @error('Email_Address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="NIK"
                            name="NIK" value="{{ old('NIK', $pelanggan->NIK ?: 'Data Belum Diisi') }}" required>
                        @error('NIK')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="PPPoE">PPPoE</label>
                        <input type="text" class="form-control @error('PPPoE') is-invalid @enderror" id="PPPoE"
                            name="PPPoE" value="{{ old('PPPoE', $pelanggan->PPPoE ?: 'Data Belum Diisi') }}" required>
                        @error('PPPoE')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Foto_KTP">Foto KTP</label>
                        <input type="file" class="form-control @error('Foto_KTP') is-invalid @enderror" id="Foto_KTP"
                            name="Foto_KTP">
                        @if ($pelanggan->Foto_KTP)
                            <br>
                            <img src="{{ asset('storage/' . $pelanggan->Foto_KTP) }}" alt="Foto KTP" width="150">
                        @endif
                        @error('Foto_KTP')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Tapak_Depan_Rumah">Tapak Depan Rumah</label>
                        <input type="file" class="form-control @error('Tapak_Depan_Rumah') is-invalid @enderror"
                            id="Tapak_Depan_Rumah" name="Tapak_Depan_Rumah">
                        @if ($pelanggan->Tapak_Depan_Rumah)
                            <br>
                            <img src="{{ asset('storage/' . $pelanggan->Tapak_Depan_Rumah) }}" alt="Tapak Depan Rumah"
                                width="150">
                        @endif
                        @error('Tapak_Depan_Rumah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Tempat_Lahir">Tempat Lahir</label>
                        <input type="text" class="form-control @error('Tempat_Lahir') is-invalid @enderror"
                            id="Tempat_Lahir" name="Tempat_Lahir"
                            value="{{ old('Tempat_Lahir', $pelanggan->Tempat_Lahir ?: 'Data Belum Diisi') }}" required>
                        @error('Tempat_Lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('Tanggal_Lahir') is-invalid @enderror"
                            id="Tanggal_Lahir" name="Tanggal_Lahir"
                            value="{{ old('Tanggal_Lahir', $pelanggan->Tanggal_Lahir ?: 'Data Belum Diisi') }}" required>
                        @error('Tanggal_Lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('Kelamin') is-invalid @enderror" id="Kelamin" name="Kelamin"
                            required>
                            <option value="L" {{ old('Kelamin', $pelanggan->Kelamin) == 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P" {{ old('Kelamin', $pelanggan->Kelamin) == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('Kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Dusun">Dusun</label>
                        <input type="text" class="form-control @error('Dusun') is-invalid @enderror" id="Dusun"
                            name="Dusun" value="{{ old('Dusun', $pelanggan->Dusun ?: 'Data Belum Diisi') }}" required>
                        @error('Dusun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="RT_RW">RT / RW</label>
                        <input type="text" class="form-control @error('RT_RW') is-invalid @enderror" id="RT_RW"
                            name="RT_RW" value="{{ old('RT_RW', $pelanggan->RT_RW ?: 'Data Belum Diisi') }}" required>
                        @error('RT_RW')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kel_Desa">Kelurahan / Desa</label>
                        <input type="text" class="form-control @error('Kel_Desa') is-invalid @enderror"
                            id="Kel_Desa" name="Kel_Desa"
                            value="{{ old('Kel_Desa', $pelanggan->Kel_Desa ?: 'Data Belum Diisi') }}" required>
                        @error('Kel_Desa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kecamatan">Kecamatan</label>
                        <input type="text" class="form-control @error('Kecamatan') is-invalid @enderror"
                            id="Kecamatan" name="Kecamatan"
                            value="{{ old('Kecamatan', $pelanggan->Kecamatan ?: 'Data Belum Diisi') }}" required>
                        @error('Kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Kabupaten_Kota">Kabupaten / Kota</label>
                        <input type="text" class="form-control @error('Kabupaten_Kota') is-invalid @enderror"
                            id="Kabupaten_Kota" name="Kabupaten_Kota"
                            value="{{ old('Kabupaten_Kota', $pelanggan->Kabupaten_Kota ?: 'Data Belum Diisi') }}"
                            required>
                        @error('Kabupaten_Kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Paket">Paket</label>
                        <input type="text" class="form-control @error('Paket') is-invalid @enderror" id="Paket"
                            name="Paket" value="{{ old('Paket', $pelanggan->Paket ?: 'Data Belum Diisi') }}" required>
                        @error('Paket')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="No_WA">No WA</label>
                        <input type="text" class="form-control @error('No_WA') is-invalid @enderror" id="No_WA"
                            name="No_WA" value="{{ old('No_WA', $pelanggan->No_WA ?: 'Data Belum Diisi') }}" required>
                        @error('No_WA')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Keterangan">Keterangan</label>
                        <textarea class="form-control @error('Keterangan') is-invalid @enderror" id="Keterangan" name="Keterangan"
                            rows="3">{{ old('Keterangan', $pelanggan->Keterangan ?: 'Data Belum Diisi') }}</textarea>
                        @error('Keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Koordinat_ONT">Koordinat ONT</label>
                        <input type="text" class="form-control @error('Koordinat_ONT') is-invalid @enderror"
                            id="Koordinat_ONT" name="Koordinat_ONT"
                            value="{{ old('Koordinat_ONT', $pelanggan->Koordinat_ONT ?? '') }}"
                            placeholder="Masukkan koordinat ONT (latitude, longitude)" readonly required>
                        @error('Koordinat_ONT')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Map Container -->
                    <div id="map" style="height: 400px; width: 100%;"></div>



                    <div class="form-group">
                        <label for="Tenaga_Ahli">Tenaga Ahli</label>
                        <input type="text" class="form-control @error('Tenaga_Ahli') is-invalid @enderror"
                            id="Tenaga_Ahli" name="Tenaga_Ahli"
                            value="{{ old('Tenaga_Ahli', $pelanggan->Tenaga_Ahli ?: 'Data Belum Diisi') }}" required>
                        @error('Tenaga_Ahli')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" id="btnSubmit" class="btn btn-primary btn-rounded">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        let map;
        let marker;
        let input = document.getElementById("Koordinat_ONT");

        // Fungsi untuk menampilkan peta dan memperbarui input
        function initMap() {
            // Mengecek apakah geolocation tersedia di browser
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    // Lokasi terkini
                    const location = [latitude, longitude];

                    // Inisialisasi peta
                    map = L.map("map").setView(location, 15);

                    // Menambahkan layer peta OpenStreetMap
                    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    }).addTo(map);

                    // Menambahkan marker di lokasi
                    marker = L.marker(location).addTo(map)
                        .bindPopup("Lokasi Saya")
                        .openPopup();

                    // Mengupdate input dengan koordinat
                    input.value = latitude + ", " + longitude;
                });
            } else {
                alert("Geolocation tidak tersedia di browser ini.");
            }
        }

        // Panggil fungsi initMap saat halaman dimuat
        window.onload = initMap;
    </script>

@endsection
