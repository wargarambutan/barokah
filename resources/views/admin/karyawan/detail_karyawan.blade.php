@extends('layouts.admin')
@section('title', 'Detail Karyawan')
@section('content')
    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Detail Karyawan</h2>
        <a href="{{ route('karyawan-barokah.index') }}" class="btn btn-secondary btn-round">
            <i class="fa fa-arrow-left btn-round"></i> Kembali</a>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="id_karyawan">ID Karyawan</label>
                        <input type="id_karyawan" class="form-control" id="id_karyawan"
                            value="{{ $karyawan->id_karyawan ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="nama_lengkap" class="form-control" id="nama_lengkap"
                            value="{{ $karyawan->user->name ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email"
                            value="{{ $karyawan->user->email ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir"
                            value="{{ $karyawan->tempat_lahir ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir"
                            value="{{ $karyawan->tanggal_lahir ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" readonly>{{ $karyawan->alamat ?: 'Data Belum Diisi' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin"
                            value="{{ $karyawan->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan"
                            value="{{ $karyawan->jabatan ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_wa">No. Whatsapp</label>
                        <input type="text" class="form-control" id="no_wa"
                            value="{{ $karyawan->no_wa ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik"
                            value="{{ $karyawan->nik ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_bpjs">No. BPJS</label>
                        <input type="text" class="form-control" id="no_bpjs"
                            value="{{ $karyawan->no_bpjs ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_npwp">No. NPWP</label>
                        <input type="text" class="form-control" id="no_npwp"
                            value="{{ $karyawan->no_npwp ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="foto_ktp">Foto KTP</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="foto_ktp"
                                value="{{ $karyawan->foto_ktp ?: 'Data Belum Diisi' }}" readonly>
                            <div class="input-group-append">
                                @if ($karyawan->foto_ktp)
                                    <a href="{{ asset('storage/' . $karyawan->foto_ktp) }}" target="_blank"
                                        class="btn btn-primary">Lihat Foto</a>
                                @else
                                    <button class="btn btn-secondary" disabled>Tidak Tersedia</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto_bpjs">Foto BPJS</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="foto_bpjs"
                                value="{{ $karyawan->foto_bpjs ?: 'Data Belum Diisi' }}" readonly>
                            <div class="input-group-append">
                                @if ($karyawan->foto_bpjs)
                                    <a href="{{ asset('storage/' . $karyawan->foto_bpjs) }}" target="_blank"
                                        class="btn btn-primary">Lihat Foto</a>
                                @else
                                    <button class="btn btn-secondary" disabled>Tidak Tersedia</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto_npwp">Foto NPWP</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="foto_npwp"
                                value="{{ $karyawan->foto_npwp ?: 'Data Belum Diisi' }}" readonly>
                            <div class="input-group-append">
                                @if ($karyawan->foto_npwp)
                                    <a href="{{ asset('storage/' . $karyawan->foto_npwp) }}" target="_blank"
                                        class="btn btn-primary">Lihat Foto</a>
                                @else
                                    <button class="btn btn-secondary" disabled>Tidak Tersedia</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sk_karyawan">SK Karyawan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="sk_karyawan"
                                value="{{ $karyawan->sk_karyawan ?: 'Data Belum Diisi' }}" readonly>
                            <div class="input-group-append">
                                @if ($karyawan->sk_karyawan)
                                    <a href="{{ asset('storage/' . $karyawan->sk_karyawan) }}" target="_blank"
                                        class="btn btn-primary">
                                        <i class="bx bx-file"></i> Lihat PDF
                                    </a>
                                @else
                                    <button class="btn btn-secondary" disabled>Tidak Tersedia</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tmt">Tanggal Mulai Tugas (TMT)</label>
                        <input type="text" class="form-control" id="tmt"
                            value="{{ $karyawan->tmt ?: 'Data Belum Diisi' }}" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
