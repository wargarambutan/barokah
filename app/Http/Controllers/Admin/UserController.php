<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Konfigurasi;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getStatusPendaftaran()
    {
        $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();
        return $konfigurasi ? $konfigurasi->nilai : 'Tutup';
    }
    // Menampilkan daftar user
    public function index(Request $request)
    {
        $user = User::all();
        return view('admin.user.data_user', [
            'user' => $user,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
