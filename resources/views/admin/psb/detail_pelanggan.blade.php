@extends('layouts.admin')
@section('title', 'Detail Pelanggan')
@section('content')
    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Detail Pelanggan</h2>
        <a href="{{ route('psb-barokah.index') }}" class="btn btn-secondary btn-round">
            <i class="fa fa-arrow-left btn-round"></i> Kembali</a>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="Email_Address">Email Address</label>
                        <input type="email" class="form-control" id="Email_Address"
                            value="{{ $pelanggan->Email_Address ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Koordinat_ONT">Koordinat ONT</label>
                        <input type="text" class="form-control" id="Koordinat_ONT" name="Koordinat_ONT"
                            value="{{ old('Koordinat_ONT', $pelanggan->Koordinat_ONT ?? '') }}"
                            placeholder="Koordinat ONT (latitude, longitude)" readonly>
                    </div>
                    <!-- Map Container -->
                    <div id="map" style="height: 400px; width: 100%;"></div>
                    <div class="form-group">
                        <label for="NUP_Id">NUP Id</label>
                        <input type="text" class="form-control" id="NUP_Id"
                            value="{{ $pelanggan->NUP_Id ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="Nama"
                            value="{{ $pelanggan->Nama ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="PPPoE">PPPoE</label>
                        <input type="text" class="form-control" id="PPPoE"
                            value="{{ $pelanggan->PPPoE ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" class="form-control" id="NIK"
                            value="{{ $pelanggan->NIK ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Tempat_Lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="Tempat_Lahir"
                            value="{{ $pelanggan->Tempat_Lahir ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="Tanggal_Lahir"
                            value="{{ $pelanggan->Tanggal_Lahir ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="Kelamin"
                            value="{{ $pelanggan->Kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Dusun">Dusun</label>
                        <input type="text" class="form-control" id="Dusun"
                            value="{{ $pelanggan->Dusun ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="RT_RW">RT / RW</label>
                        <input type="text" class="form-control" id="RT_RW"
                            value="{{ $pelanggan->RT_RW ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Kel_Desa">Kelurahan / Desa</label>
                        <input type="text" class="form-control" id="Kel_Desa"
                            value="{{ $pelanggan->Kel_Desa ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="Kecamatan"
                            value="{{ $pelanggan->Kecamatan ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Kabupaten_Kota">Kabupaten / Kota</label>
                        <input type="text" class="form-control" id="Kabupaten_Kota"
                            value="{{ $pelanggan->Kabupaten_Kota ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Paket">Paket</label>
                        <input type="text" class="form-control" id="Paket"
                            value="{{ $pelanggan->Paket ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Tapak_Depan_Rumah">Tapak Depan Rumah</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                @if ($pelanggan->Tapak_Depan_Rumah)
                                    <a href="{{ asset('storage/' . $pelanggan->Tapak_Depan_Rumah) }}" target="_blank"
                                        class="btn btn-primary btn-round btn-sm">Lihat Foto</a>
                                @else
                                    <button class="btn btn-secondary btn-round btn-sm" disabled>Tidak Tersedia</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Foto_KTP">Foto KTP</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                @if ($pelanggan->Foto_KTP)
                                    <a href="{{ asset('storage/' . $pelanggan->Foto_KTP) }}" target="_blank"
                                        class="btn btn-primary btn-round btn-sm">Lihat Foto</a>
                                @else
                                    <button class="btn btn-secondary btn-round btn-sm" disabled>Tidak Tersedia</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="No_WA">No WA</label>
                        <input type="text" class="form-control" id="No_WA"
                            value="{{ $pelanggan->No_WA ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Keterangan">Keterangan</label>
                        <textarea class="form-control" id="Keterangan" rows="3" readonly>{{ $pelanggan->Keterangan ?: 'Data Belum Diisi' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="Tenaga_Ahli">Tenaga Ahli</label>
                        <input type="text" class="form-control" id="Tenaga_Ahli"
                            value="{{ $pelanggan->Tenaga_Ahli ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Timestamp">Timestamp</label>
                        <input type="text" class="form-control" id="Timestamp"
                            value="{{ $pelanggan->Timestamp ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group text-end">
                        <a href="{{ route('psb-barokah.cetakIdCard', $pelanggan->id) }}"
                            class="btn btn-secondary btn-round" target="_blank">
                            <i class="fa fa-print"></i> Cetak ID Card
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let map;
        let marker;
        let koordinat = "{{ old('Koordinat_ONT', $pelanggan->Koordinat_ONT ?? '') }}"; // Ambil koordinat dari database

        // Fungsi untuk menampilkan peta berdasarkan koordinat
        function initMap() {
            if (koordinat) {
                // Split koordinat menjadi latitude dan longitude
                let coords = koordinat.split(", ");
                let latitude = parseFloat(coords[0]);
                let longitude = parseFloat(coords[1]);

                // Inisialisasi peta
                map = L.map("map").setView([latitude, longitude], 15);

                // Menambahkan layer peta OpenStreetMap
                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                }).addTo(map);

                // Menambahkan marker di lokasi sesuai koordinat
                marker = L.marker([latitude, longitude]).addTo(map)
                    .bindPopup("Lokasi Pelanggan")
                    .openPopup();
            } else {
                alert("Koordinat tidak ditemukan.");
            }
        }

        // Panggil fungsi initMap saat halaman dimuat
        window.onload = initMap;
    </script>
@endsection
