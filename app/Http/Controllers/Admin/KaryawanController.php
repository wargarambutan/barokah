<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Konfigurasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    private function getStatusPendaftaran()
    {
        $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();
        return $konfigurasi ? $konfigurasi->nilai : 'Tutup';
    }
    // Menampilkan daftar karyawan
    public function index(Request $request)
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan.data_karyawan', [
            'karyawan' => $karyawan,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    // Menampilkan form untuk menambah karyawan
    public function create()
    {
        return view('admin.karyawan.tambah_karyawan', [
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    // Menyimpan data karyawan
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            // Validasi untuk tabel users
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:super_admin,admin,teknisi',

            // Validasi untuk tabel karyawan
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'required|in:Admin,Developer,Teknisi',
            'no_wa' => 'required|string|max:20',
            'nik' => 'nullable|string|max:16|unique:karyawan,nik',
            'no_bpjs' => 'nullable|string|max:20',
            'no_npwp' => 'nullable|string|max:20',
            'pas_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'foto_ktp' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'foto_bpjs' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'foto_npwp' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'sk_karyawan' => 'nullable|file|mimes:pdf|max:500',
            'tmt' => 'required|date',
        ]);

        DB::beginTransaction(); // Mulai transaksi
        try {
            // Proses upload file jika ada
            $paths = collect(['pas_foto', 'foto_ktp', 'foto_bpjs', 'foto_npwp', 'sk_karyawan'])->mapWithKeys(function ($field) use ($request) {
                return [$field => $request->hasFile($field) ? $request->file($field)->store("public/{$field}") : null];
            })->toArray();

            // Simpan data ke tabel users
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            // Generate ID Karyawan
            $idKaryawan = '150552' . str_pad(Karyawan::max('id_karyawan') + 1, 4, '0', STR_PAD_LEFT);

            // Simpan data ke tabel karyawan
            Karyawan::create(array_merge([
                'user_id' => $user->id,
                'id_karyawan' => $idKaryawan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jabatan' => $request->jabatan,
                'no_wa' => $request->no_wa,
                'nik' => $request->nik,
                'no_bpjs' => $request->no_bpjs,
                'no_npwp' => $request->no_npwp,
                'tmt' => $request->tmt,
            ], $paths));

            DB::commit(); // Commit transaksi jika semua sukses
            return redirect()->route('karyawan-barokah.index')->with('success', 'Data karyawan berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi jika terjadi error
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->route('karyawan-barokah.index')->with('success', 'Data karyawan berhasil disimpan.');
    }





    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.detail_karyawan', [
            'karyawan' => $karyawan,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }


    // Menampilkan form untuk mengedit pelanggan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit_karyawan', [
            'karyawan' => $karyawan,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255,' . $id, // Pastikan email unik kecuali untuk karyawan ini
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:super_admin,admin,teknisi',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'required|in:Admin,Developer,Teknisi',
            'no_wa' => 'required|string|max:20',
            'nik' => 'nullable|string|max:16,' . $id, // Pastikan NIK unik
            'no_bpjs' => 'nullable|string|max:20',
            'no_npwp' => 'nullable|string|max:20',
            'pas_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'foto_ktp' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'foto_bpjs' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'foto_npwp' => 'nullable|file|mimes:jpg,jpeg,png|max:500',
            'sk_karyawan' => 'nullable|file|mimes:pdf|max:500',
            'tmt' => 'required|date',
        ]);;

        DB::beginTransaction();
        try {
            // Ambil data karyawan yang akan diupdate
            $karyawan = Karyawan::findOrFail($id);

            // Proses upload file jika ada perubahan
            $paths = collect(['pas_foto', 'foto_ktp', 'foto_bpjs', 'foto_npwp', 'sk_karyawan'])->mapWithKeys(function ($field) use ($request) {
                return [$field => $request->hasFile($field) ? $request->file($field)->store("public/{$field}") : null];
            })->toArray();

            // Update data di tabel users
            $user = User::findOrFail($karyawan->user_id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);

            // Update data karyawan
            $karyawan->update(array_merge([
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jabatan' => $request->jabatan,
                'no_wa' => $request->no_wa,
                'nik' => $request->nik,
                'no_bpjs' => $request->no_bpjs,
                'no_npwp' => $request->no_npwp,
                'tmt' => $request->tmt,
            ], $paths));

            DB::commit();
            return redirect()->route('karyawan-barokah.index')->with('success', 'Data karyawan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    // Menghapus data karyawan
    public function destroy($id)
    {
        // Temukan data karyawan berdasarkan ID
        $karyawan = Karyawan::findOrFail($id);

        if ($karyawan->pas_foto) {
            $pasFotoPath = storage_path('app/public/' . $karyawan->pas_foto);
            if (file_exists($pasFotoPath)) {
                unlink($pasFotoPath); // Hapus file pas foto
            }
        }
        if ($karyawan->foto_ktp) {
            $fotoKTPPath = storage_path('app/public/' . $karyawan->foto_ktp);
            if (file_exists($fotoKTPPath)) {
                unlink($fotoKTPPath); // Hapus file foto KTP
            }
        }
        if ($karyawan->foto_bpjs) {
            $fotoBPJSPath = storage_path('app/public/' . $karyawan->foto_bpjs);
            if (file_exists($fotoBPJSPath)) {
                unlink($fotoBPJSPath); // Hapus file foto bpjs
            }
        }
        if ($karyawan->foto_npwp) {
            $fotoNPWPPath = storage_path('app/public/' . $karyawan->foto_npwp);
            if (file_exists($fotoNPWPPath)) {
                unlink($fotoNPWPPath); // Hapus file foto npwp
            }
        }
        if ($karyawan->sk_karyawan) {
            $skKaryawanPath = storage_path('app/public/' . $karyawan->sk_karyawan);
            if (file_exists($skKaryawanPath)) {
                unlink($skKaryawanPath); // Hapus file sk karyawan
            }
        }

        if ($karyawan->user) {
            $karyawan->user->delete(); // Hapus data user
        }

        // Hapus data karyawan dari database
        $karyawan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('karyawan-barokah.index')->with('success', 'Data karyawan berhasil dihapus!');
    }
}
