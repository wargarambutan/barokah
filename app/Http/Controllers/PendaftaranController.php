<?php

namespace App\Http\Controllers;


use App\Models\Konfigurasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function pendaftaran()
    {

        // Ambil status pendaftaran dari tabel konfigurasi
        $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();

        // Cek apakah pendaftaran sedang dibuka atau ditutup
        $pendaftaranTutup = $konfigurasi && $konfigurasi->nilai === 'Tutup';

        return view('pendaftaran', compact('pendaftaranTutup'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'nomor_telepon' => 'required|string|max:15',
            'alamat_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:pria,wanita',
            'nomor_ktp' => 'required|string|max:20',
            'pendidikan_terakhir' => 'nullable|string',
            'jurusan' => 'nullable|string|max:255',
            'nama_institusi' => 'nullable|string|max:255',
            'tahun_lulus' => 'nullable|integer',
            'posisi_terakhir' => 'nullable|string|max:255',
            'nama_perusahaan_terakhir' => 'nullable|string|max:255',
            'lama_bekerja' => 'nullable|string|max:255',
            'deskripsi_pekerjaan' => 'nullable|string',
            'posisi_yang_dilamar' => 'required|string|max:255',
            'keahlian_khusus' => 'required|string|max:255',
            'foto_ktp' => 'required|image|max:500',
            'foto_karyawan' => 'required|image|max:500',
            'unggah_cv' => 'required|file|max:500|mimes:pdf,doc,docx',
            'ijazah' => 'nullable|file|max:500|mimes:pdf,doc,docx,jpeg,png,jpg',
            'sertifikat' => 'nullable|file|max:500|mimes:pdf,doc,docx,jpeg,png,jpg',

        ]);

        // Simpan data pendaftaran
        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama_lengkap = $request->nama_lengkap;
        $pendaftaran->email = $request->email;
        $pendaftaran->nomor_telepon = $request->nomor_telepon;
        $pendaftaran->alamat_lengkap = $request->alamat_lengkap;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
        $pendaftaran->nomor_ktp = $request->nomor_ktp;
        $pendaftaran->pendidikan_terakhir = $request->pendidikan_terakhir;
        $pendaftaran->jurusan = $request->jurusan;
        $pendaftaran->nama_institusi = $request->nama_institusi;
        $pendaftaran->tahun_lulus = $request->tahun_lulus;
        $pendaftaran->posisi_terakhir = $request->posisi_terakhir;
        $pendaftaran->nama_perusahaan_terakhir = $request->nama_perusahaan_terakhir;
        $pendaftaran->lama_bekerja = $request->lama_bekerja;
        $pendaftaran->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $pendaftaran->posisi_yang_dilamar = $request->posisi_yang_dilamar;
        $pendaftaran->keahlian_khusus = $request->keahlian_khusus;
        $pendaftaran->status = 'Menunggu Verifikasi'; // Set status secara otomatis

        // Mengelola file yang diunggah
        if ($request->hasFile('foto_ktp')) {
            $pendaftaran->foto_ktp = $request->file('foto_ktp')->store('uploads/foto_ktp', 'public');
        }

        if ($request->hasFile('foto_karyawan')) {
            $pendaftaran->foto_karyawan = $request->file('foto_karyawan')->store('uploads/foto_karyawan', 'public');
        }

        if ($request->hasFile('unggah_cv')) {
            $pendaftaran->unggah_cv = $request->file('unggah_cv')->store('uploads/cv', 'public');
        }

        if ($request->hasFile('ijazah')) {
            $pendaftaran->ijazah = $request->file('ijazah')->store('uploads/ijazah', 'public');
        }

        if ($request->hasFile('sertifikat')) {
            $pendaftaran->sertifikat = $request->file('sertifikat')->store('uploads/sertifikat', 'public');
        }

        // Simpan data pendaftaran ke database
        $pendaftaran->save();
        Log::info('Data pendaftaran berhasil disimpan: ', $pendaftaran->toArray());


        // Menambahkan pesan sukses
        session()->flash('success', 'Pendaftaran berhasil!');

        // Redirect dengan pesan sukses
        return redirect()->route('cek-pendaftaran');
    }


    public function cekPendaftaran(Request $request)
    {
        $nik = $request->input('nik');
        $email = $request->input('email');

        // Cari pendaftaran berdasarkan NIK dan email
        $pendaftarans = Pendaftaran::where('nomor_ktp', $nik)
            ->where('email', $email)
            ->get(); // Menggunakan get() untuk mengambil semua hasil yang sesuai

        // if ($pendaftarans->isEmpty()) {
        //     return redirect()->route('cek-pendaftaran')
        //         ->with('error', 'Data pendaftaran tidak ditemukan.');
        // }


        // Pastikan jika tidak ada hasil, $pendaftarans tetap ada (bukan null)
        return view('cek_pendaftaran', compact('pendaftarans'));
    }



    // Fungsi untuk menampilkan detail pendaftaran
    public function show($id)
    {
        // Cari data pendaftaran berdasarkan ID
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Tampilkan halaman detail pendaftaran
        return view('lihat_pendaftaran', compact('pendaftaran'));
    }


    // Fungsi untuk menghapus pendaftaran
    public function destroy($id)
    {
        // Cari data pendaftaran berdasarkan ID
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Hapus data pendaftaran
        $pendaftaran->delete();

        // Ambil parameter email dan nik dari form
        $email = request('email');
        $nik = request('nik');

        // Redirect ke halaman cek-pendaftaran dengan parameter email dan nik
        return redirect()->route('cek-pendaftaran', ['email' => $email, 'nik' => $nik])
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
