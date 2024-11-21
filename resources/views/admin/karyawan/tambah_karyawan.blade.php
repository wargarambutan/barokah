@extends('layouts.admin')

@section('title', 'Tambah Data Karyawan')

@section('content')
    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Tambah Data Karyawan</h2>
        <a href="{{ route('karyawan-barokah.index') }}" class="btn btn-secondary btn-round">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops! Terjadi kesalahan:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('karyawan-barokah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                            required>
                            {{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan"
                            required>
                            <option value="">Pilih Jabatan</option>
                            <option value="Admin" {{ old('jabatan') == 'Admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="Developer" {{ old('jabatan') == 'Developer' ? 'selected' : '' }}>Developer
                            </option>
                            <option value="Teknisi" {{ old('jabatan') == 'Teknisi' ? 'selected' : '' }}>Teknisi</option>
                        </select>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_wa">No. Whatsapp</label>
                        <input type="text" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa"
                            name="no_wa" value="{{ old('no_wa') }}" required>
                        @error('no_wa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_bpjs">No. BPJS</label>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="text" class="form-control @error('no_bpjs') is-invalid @enderror" id="no_bpjs"
                            name="no_bpjs" value="{{ old('no_bpjs') }}">
                        @error('no_bpjs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_npwp">No. NPWP</label>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="text" class="form-control @error('no_npwp') is-invalid @enderror" id="no_npwp"
                            name="no_npwp" value="{{ old('no_npwp') }}">
                        @error('no_npwp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pas_foto">Pas Foto</label>
                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="file" class="form-control @error('pas_foto') is-invalid @enderror"
                            id="pas_foto" name="pas_foto" accept="image/*">
                        @error('pas_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_ktp">Foto KTP</label>
                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror"
                            id="foto_ktp" name="foto_ktp" accept="image/*">
                        @error('foto_ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_bpjs">Foto BPJS</label>
                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="file" class="form-control @error('foto_bpjs') is-invalid @enderror"
                            id="foto_bpjs" name="foto_bpjs" accept="image/*">
                        @error('foto_bpjs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_npwp">Foto NPWP</label>
                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="file" class="form-control @error('foto_npwp') is-invalid @enderror"
                            id="foto_npwp" name="foto_npwp" accept="image/*">
                        @error('foto_npwp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sk_karyawan">SK Karyawan</label>
                        <span style="font-size: 0.9em; color: #555;">(Maksimal 500 KB)</span>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="file" class="form-control @error('sk_karyawan') is-invalid @enderror"
                            id="sk_karyawan" name="sk_karyawan" accept="application/pdf">
                        @error('sk_karyawan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tmt">Tanggal Mulai Tugas (TMT)</label>
                        <input type="date" class="form-control @error('tmt') is-invalid @enderror" id="tmt"
                            name="tmt" value="{{ old('tmt') }}" required>
                        @error('tmt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Hak Akses</label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role"
                            required>
                            <option value="">Pilih Hak Akses</option>
                            <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin
                            </option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="teknisi" {{ old('role') == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-primary btn-round">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
