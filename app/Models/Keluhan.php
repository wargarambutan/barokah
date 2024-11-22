<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'keluhan';

    // Menonaktifkan penggunaan timestamps bawaan Laravel
    public $timestamps = false;

    // Mendefinisikan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_pelanggan',           // ID Pelanggan yang mengajukan keluhan
        'keluhan',            // Isi keluhan secara rinci
        'status',                 // Status keluhan (Pending/Dalam Proses/Selesai)
        'id_teknisi',             // ID teknisi yang menangani keluhan (nullable)
        'jenis_gangguan',
        'bentuk_tindakan',
    ];

    // Relasi ke model PsbBarokah (Data Pelanggan)
    public function pelanggan()
    {
        return $this->belongsTo(PsbBarokah::class, 'id_pelanggan', 'NUP_Id'); // Sesuaikan nama kolom primary key pelanggan
    }

    // Relasi ke model Karyawan (Teknisi)
    public function teknisi()
    {
        return $this->belongsTo(Karyawan::class, 'id_teknisi', 'id_karyawan'); // Sesuaikan dengan nama kolom primary key teknisi
    }
}
