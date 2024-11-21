<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\PsbBarokah;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Menampilkan daftar pelanggan
    public function create()
    {
        return view('registrasi_pelanggan.daftar');
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:255',
            'Email_Address' => 'required|email|max:255',
            'NIK' => 'required|string|max:20|unique:psb_barokah,NIK',
            'PPPoE' => 'required|string|max:20',
            'Foto_KTP' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:500',
            'Tapak_Depan_Rumah' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:500', // validasi untuk Tapak_Depan_Rumah
            'Tempat_Lahir' => 'required|string|max:255',
            'Tanggal_Lahir' => 'required|date',
            'Kelamin' => 'required|in:L,P',
            'Dusun' => 'required|string|max:255',
            'RT_RW' => 'required|string|max:10',
            'Kel_Desa' => 'required|string|max:255',
            'Kecamatan' => 'required|string|max:255',
            'Kabupaten_Kota' => 'required|string|max:255',
            'Paket' => 'required|string|max:255',
            'No_WA' => 'required|string|max:15',
            'Keterangan' => 'nullable|string',
            'Koordinat_ONT' => 'required|regex:/^\-?\d{1,3}\.\d+,\s*\-?\d{1,3}\.\d+$/',
            'Tenaga_Ahli' => 'required|string|max:255',
        ]);

        // Membuat NUP_Id otomatis
        $lastNupId = PsbBarokah::max('NUP_Id'); // Ambil NUP_Id terakhir dari database
        $nextNupId = $lastNupId ? intval(substr($lastNupId, -5)) + 1 : 157; // Ambil nomor akhir dari NUP terakhir dan tambahkan 1
        $newNupId = '150_552_' . str_pad($nextNupId, 5, '0', STR_PAD_LEFT); // Format NUP_Id baru

        $pelanggan = new PsbBarokah();
        $pelanggan->NUP_Id = $newNupId;
        $pelanggan->Nama = $request->Nama;
        $pelanggan->Email_Address = $request->Email_Address;
        $pelanggan->NIK = $request->NIK;
        $pelanggan->PPPoE = $request->PPPoE;
        $pelanggan->Tempat_Lahir = $request->Tempat_Lahir;
        $pelanggan->Tanggal_Lahir = $request->Tanggal_Lahir;
        $pelanggan->Kelamin = $request->Kelamin;
        $pelanggan->Dusun = $request->Dusun;
        $pelanggan->RT_RW = $request->RT_RW;
        $pelanggan->Kel_Desa = $request->Kel_Desa;
        $pelanggan->Kecamatan = $request->Kecamatan;
        $pelanggan->Kabupaten_Kota = $request->Kabupaten_Kota;
        $pelanggan->Paket = $request->Paket;
        $pelanggan->No_WA = $request->No_WA;
        $pelanggan->Keterangan = $request->Keterangan;
        $pelanggan->Koordinat_ONT = $request->Koordinat_ONT;
        $pelanggan->Tenaga_Ahli = $request->Tenaga_Ahli;
        $pelanggan->Timestamp = now();

        // Menyimpan file Foto_KTP jika ada
        if ($request->hasFile('Foto_KTP')) {
            $pelanggan->Foto_KTP = $request->file('Foto_KTP')->store('public/ktp');
        }

        // Menyimpan file Tapak_Depan_Rumah jika ada
        if ($request->hasFile('Tapak_Depan_Rumah')) {
            $pelanggan->Tapak_Depan_Rumah = $request->file('Tapak_Depan_Rumah')->store('public/tapak_depan_rumah');
        }

        $pelanggan->save();

        return redirect()->route('pendaftaran-pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }
}
