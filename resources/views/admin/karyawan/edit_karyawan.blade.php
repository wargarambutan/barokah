@extends('layouts.admin')

@section('title', 'Edit Data Karyawan')

@section('content')
    <div class="d-xl-flex justify-content-between align-items-start mb-3">
        <h2 class="text-dark font-weight-bold mb-2">Edit Data Karyawan</h2>
        <a href="{{ route('karyawan-barokah.index' ?: 'Data Belum Diisi') }}" class="btn btn-secondary btn-rounded">
            <i class="fa fa-arrow-left btn-round"></i> Kembali
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
                <form action="{{ route('karyawan-barokah.update', $karyawan->id ?: 'Data Belum Diisi') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $karyawan->user->name ?: 'Data Belum Diisi') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $karyawan->user->email ?: 'Data Belum Diisi') }}" required
                            autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}" autocomplete="off">
                        <small class="form-text text-muted">Jika tidak ingin mengubah password, biarkan kolom ini
                            kosong.</small>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation') }}">
                        <small class="form-text text-muted">Masukkan ulang password jika Anda mengubahnya.</small>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir', $karyawan->tempat_lahir ?: 'Data Belum Diisi') }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir ?: 'Data Belum Diisi') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                            required>{{ old('alamat', $karyawan->alamat ?: 'Data Belum Diisi') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L"
                                {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P"
                                {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
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
                            <option value="Admin" {{ old('jabatan', $karyawan->jabatan) == 'Admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="Developer"
                                {{ old('jabatan', $karyawan->jabatan) == 'Developer' ? 'selected' : '' }}>
                                Developer
                            </option>
                            <option value="Teknisi"
                                {{ old('jabatan', $karyawan->jabatan) == 'Teknisi' ? 'selected' : '' }}>
                                Teknisi
                            </option>
                        </select>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_wa">No. Whatsapp</label>
                        <input type="text" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa"
                            name="no_wa" value="{{ old('no_wa', $karyawan->no_wa ?: 'Data Belum Diisi') }}" required>
                        @error('no_wa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" value="{{ old('nik', $karyawan->nik ?: 'Data Belum Diisi') }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_bpjs">No. BPJS</label>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="text" class="form-control @error('no_bpjs') is-invalid @enderror" id="no_bpjs"
                            name="no_bpjs" value="{{ old('no_bpjs', $karyawan->no_bpjs ?: 'Data Belum Diisi') }}">
                        @error('no_bpjs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_npwp">No. NPWP</label>
                        <span style="font-size: 0.9em; color: #555;">(Optional)</span>
                        <input type="text" class="form-control @error('no_npwp') is-invalid @enderror" id="no_npwp"
                            name="no_npwp" value="{{ old('no_npwp', $karyawan->no_npwp ?: 'Data Belum Diisi') }}">
                        @error('no_npwp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pas_foto">Pas Foto</label>
                        <input type="file" class="form-control @error('pas_foto') is-invalid @enderror"
                            id="pas_foto" name="pas_foto" accept="image/*">
                        @if ($karyawan->pas_foto)
                            <br>
                            <img src="{{ asset('storage/' . $karyawan->pas_foto ?: 'Data Belum Diisi') }}" alt="Foto KTP"
                                width="150">
                        @endif
                        @error('pas_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_ktp">Foto KTP</label>
                        <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror"
                            id="foto_ktp" name="foto_ktp" accept="image/*">
                        @if ($karyawan->foto_ktp)
                            <br>
                            <img src="{{ asset('storage/' . $karyawan->foto_ktp ?: 'Data Belum Diisi') }}" alt="Foto KTP"
                                width="150">
                        @endif
                        @error('foto_ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_bpjs">Foto BPJS</label>
                        <input type="file" class="form-control @error('foto_bpjs') is-invalid @enderror"
                            id="foto_bpjs" name="foto_bpjs" accept="image/*">
                        @if ($karyawan->foto_bpjs)
                            <br>
                            <img src="{{ asset('storage/' . $karyawan->foto_bpjs ?: 'Data Belum Diisi') }}"
                                alt="Foto KTP" width="150">
                        @endif
                        @error('foto_bpjs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_npwp">Foto NPWP</label>
                        <input type="file" class="form-control @error('foto_npwp') is-invalid @enderror"
                            id="foto_npwp" name="foto_npwp" accept="image/*">
                        @if ($karyawan->foto_npwp)
                            <br>
                            <img src="{{ asset('storage/' . $karyawan->foto_npwp ?: 'Data Belum Diisi') }}"
                                alt="Foto KTP" width="150">
                        @endif
                        @error('foto_npwp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sk_karyawan">SK Karyawan</label>
                        <input type="file" class="form-control @error('sk_karyawan') is-invalid @enderror"
                            id="sk_karyawan" name="sk_karyawan" accept="application/pdf">
                        @if ($karyawan->sk_karyawan)
                            <br>
                            <!-- Tampilkan tombol untuk melihat PDF -->
                            <a href="{{ asset('storage/' . $karyawan->sk_karyawan ?: 'Data Belum Diisi') }}"
                                target="_blank" class="btn btn-primary btn-sm">Lihat PDF</a>
                        @endif

                        @error('sk_karyawan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tmt">Tanggal Mulai Tugas (TMT)</label>
                        <input type="date" class="form-control @error('tmt') is-invalid @enderror" id="tmt"
                            name="tmt" value="{{ old('tmt', $karyawan->tmt ?: 'Data Belum Diisi') }}" required>
                        @error('tmt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Hak Akses</label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role"
                            required>
                            <option value="">Pilih Hak Akses</option>
                            <option value="super_admin"
                                {{ old('role', $karyawan->user->role) == 'super_admin' ? 'selected' : '' }}>
                                Super Admin
                            </option>
                            <option value="admin" {{ old('role', $karyawan->user->role) == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="Teknisi"
                                {{ old('role', $karyawan->user->role) == 'Teknisi' ? 'selected' : '' }}>
                                Teknisi
                            </option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
