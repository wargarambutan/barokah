<?php

namespace App\Http\Controllers\Teknisi;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teknisi.index');
    }

    public function keluhan()
    {
        // Ambil semua data keluhan dengan status 'Pending' dari tabel
        $keluhan = Keluhan::with(['pelanggan', 'teknisi'])
            ->where('status', 'Pending') // Menambahkan filter berdasarkan status
            ->get();

        // Kirim data ke view
        return view('teknisi.keluhan', compact('keluhan'));
    }

    public function keluhanDitangani()
    {
        // Ambil user_id dari pengguna yang sedang login
        $user_id = Auth::id();

        // Cari teknisi berdasarkan user_id
        $teknisi = Karyawan::where('user_id', $user_id)->first();

        if (!$teknisi) {
            // Jika teknisi tidak ditemukan, redirect dengan pesan error
            return redirect()->route('keluhan')->with('error', 'Teknisi tidak ditemukan.');
        }

        // Ambil data keluhan berdasarkan id_karyawan teknisi
        $keluhan = Keluhan::with(['pelanggan', 'teknisi'])
            ->where('id_teknisi', $teknisi->id_karyawan) // Sesuaikan id_teknisi dengan id_karyawan teknisi
            ->get();

        // Kirim data ke view
        return view('teknisi.keluhan_ditangani', compact('keluhan'));
    }


    public function ambilTugas(Keluhan $keluhan)
    {
        // Mendapatkan ID teknisi yang sedang login
        $id_teknisi = Auth::id(); // Mengambil ID pengguna yang login (ID teknisi)

        // Cek apakah teknisi tersebut ada di tabel karyawan berdasarkan user_id
        $teknisi = Karyawan::where('user_id', $id_teknisi)->first();

        if (!$teknisi) {
            return redirect()->route('keluhan')->with('error', 'Teknisi tidak ditemukan.');
        }

        // Update status keluhan dan ID teknisi
        $keluhan->status = 'Dalam Proses'; // Ubah status menjadi "Dalam Proses"
        $keluhan->id_teknisi = $teknisi->id_karyawan; // Set ID teknisi yang sedang login
        $keluhan->save(); // Simpan perubahan ke database

        // Kembalikan ke halaman keluhan dengan pesan sukses
        return redirect()->route('keluhan')->with('success', 'Tugas berhasil diambil.');
    }

    public function editKeluhan($id)
    {
        // Cari data keluhan berdasarkan ID
        $keluhan = Keluhan::with(['teknisi', 'pelanggan'])->findOrFail($id);

        // Kirim data keluhan ke view
        return view('teknisi.lengkapi_data', compact('keluhan'));
    }

    public function updateKeluhan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'keluhan' => 'required|string|max:255',
            'jenis_gangguan' => 'nullable|string|max:255',
            'bentuk_tindakan' => 'nullable|string|max:255',
        ]);

        // Cari data keluhan
        $keluhan = Keluhan::findOrFail($id);

        // Update data keluhan
        $keluhan->update([
            'keluhan' => $request->keluhan,
            'status' => 'Selesai',
            'jenis_gangguan' => $request->jenis_gangguan,
            'bentuk_tindakan' => $request->bentuk_tindakan,
        ]);

        return redirect()->route('ditangani')->with('success', 'Data keluhan berhasil diperbarui.');
    }
}
