@extends('layouts.app')

@section('title', 'Registrasi Pelanggan')

@section('content')

    <!-- Form Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h1 class="display-6 mb-2">Daftarkan Pelanggan</h1>
                        @if (session('success'))
                            <div class="alert alert-success mt-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('pendaftaran-pelanggan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Row 1 -->
                            <div class="row mt-3">
                                <!-- Nama -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nama">Nama</label>
                                        <input type="text" name="Nama" id="Nama"
                                            class="form-control @error('Nama') is-invalid @enderror" required>
                                        @error('Nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Email_Address">Email Address</label>
                                        <input type="email" name="Email_Address" id="Email_Address"
                                            class="form-control @error('Email_Address') is-invalid @enderror" required>
                                        @error('Email_Address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <!-- Koordinat ONT -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Koordinat_ONT">Koordinat ONT</label>
                                        <input type="text" name="Koordinat_ONT" id="Koordinat_ONT"
                                            class="form-control @error('Koordinat_ONT') is-invalid @enderror" readonly
                                            required>
                                        <div id="map" style="height: 300px; margin-top: 15px;"></div>
                                        @error('Koordinat_ONT')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- PPPoE -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="PPPoE">PPPoE</label>
                                        <input type="text" name="PPPoE" id="PPPoE"
                                            class="form-control @error('PPPoE') is-invalid @enderror" required>
                                        @error('PPPoE')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- NIK -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NIK">NIK</label>
                                        <input type="text" name="NIK" id="NIK"
                                            class="form-control @error('NIK') is-invalid @enderror" required>
                                        @error('NIK')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tempat Lahir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Tempat_Lahir">Tempat Lahir</label>
                                        <input type="text" name="Tempat_Lahir" id="Tempat_Lahir"
                                            class="form-control @error('Tempat_Lahir') is-invalid @enderror" required>
                                        @error('Tempat_Lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Tanggal Lahir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                                        <input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir"
                                            class="form-control @error('Tanggal_Lahir') is-invalid @enderror" required>
                                        @error('Tanggal_Lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Kelamin -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Kelamin">Kelamin</label>
                                        <select name="Kelamin" id="Kelamin"
                                            class="form-control @error('Kelamin') is-invalid @enderror" required>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        @error('Kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Dusun -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Dusun">Dusun</label>
                                        <input type="text" name="Dusun" id="Dusun"
                                            class="form-control @error('Dusun') is-invalid @enderror" required>
                                        @error('Dusun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- RT / RW -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RT_RW">RT / RW</label>
                                        <input type="text" name="RT_RW" id="RT_RW"
                                            class="form-control @error('RT_RW') is-invalid @enderror" required>
                                        @error('RT_RW')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Kelurahan / Desa -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Kel_Desa">Kelurahan/Desa</label>
                                        <input type="text" name="Kel_Desa" id="Kel_Desa"
                                            class="form-control @error('Kel_Desa') is-invalid @enderror" required>
                                        @error('Kel_Desa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Kecamatan -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Kecamatan">Kecamatan</label>
                                        <input type="text" name="Kecamatan" id="Kecamatan"
                                            class="form-control @error('Kecamatan') is-invalid @enderror" required>
                                        @error('Kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Kabupaten / Kota -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Kabupaten_Kota">Kabupaten/Kota</label>
                                        <input type="text" name="Kabupaten_Kota" id="Kabupaten_Kota"
                                            class="form-control @error('Kabupaten_Kota') is-invalid @enderror" required>
                                        @error('Kabupaten_Kota')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Paket -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Paket">Paket</label>
                                        <input type="text" name="Paket" id="Paket"
                                            class="form-control @error('Paket') is-invalid @enderror" required>
                                        @error('Paket')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- Tapak Depan Rumah -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Tapak_Depan_Rumah">Tapak Depan Rumah</label>
                                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                                        <input type="file"
                                            class="form-control @error('Tapak_Depan_Rumah') is-invalid @enderror"
                                            id="Tapak_Depan_Rumah" name="Tapak_Depan_Rumah">
                                        @error('Tapak_Depan_Rumah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Foto KTP -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Foto_KTP">Foto KTP</label>
                                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                                        <input type="file"
                                            class="form-control @error('Foto_KTP') is-invalid @enderror" id="Foto_KTP"
                                            name="Foto_KTP">
                                        @error('Foto_KTP')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <!-- No WA -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="No_WA">No WA</label>
                                        <input type="text" name="No_WA" id="No_WA"
                                            class="form-control @error('No_WA') is-invalid @enderror" required>
                                        @error('No_WA')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Tenaga_Ahli">Tenaga Ahli</label>
                                        <input type="text" name="Tenaga_Ahli" id="Tenaga_Ahli"
                                            class="form-control @error('Tenaga_Ahli') is-invalid @enderror" required>
                                        @error('Tenaga_Ahli')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <button type="submit" id="btnSubmit" class="btn btn-primary mt-3">Daftarkan
                                Pelanggan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Form End -->

@endsection

@section('scripts')
    <!-- Tambahkan Leaflet JS dan CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // Fungsi untuk mendapatkan lokasi perangkat
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Ambil koordinat latitude dan longitude
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Set koordinat ke input field
                    document.getElementById("Koordinat_ONT").value = latitude + ", " + longitude;

                    // Tampilkan lokasi pada peta
                    var map = L.map('map').setView([latitude, longitude], 13); // Set view ke koordinat perangkat

                    // Tambahkan layer OpenStreetMap
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.barokahnet.id">barokahnet.id</a>'
                    }).addTo(map);

                    // Tambahkan marker di lokasi
                    L.marker([latitude, longitude]).addTo(map)
                        .bindPopup("Lokasi Anda")
                        .openPopup();
                }, function(error) {
                    alert("Geolocation tidak diizinkan atau gagal.");
                });
            } else {
                alert("Geolocation tidak didukung pada browser ini.");
            }
        }

        // Panggil fungsi untuk mendapatkan lokasi saat halaman dimuat
        window.onload = getLocation;
    </script>

@endsection
