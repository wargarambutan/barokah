<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'konfigurasi';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_konfigurasi',
        'nilai',
    ];

    // Tambahkan cast untuk tipe enum agar mempermudah pengelolaan data
    protected $casts = [
        'nilai' => 'string',
    ];

    public static function isPendaftaranDibuka()
    {
        $status = self::where('nama_konfigurasi', 'status_pendaftaran')->first();
        return $status && $status->nilai === 'Buka';
    }
}
