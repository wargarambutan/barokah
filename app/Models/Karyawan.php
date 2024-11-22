<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    // Menentukan nama tabel yang digunakan
    protected $table = 'karyawan';
    public $timestamps = false;

    protected $fillable = [
        'id_karyawan',
        'user_id',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'jabatan',
        'no_wa',
        'nik',
        'no_bpjs',
        'no_npwp',
        'pas_foto',
        'foto_ktp',
        'foto_bpjs',
        'foto_npwp',
        'sk_karyawan',
        'tmt',
        'registrasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keluhan()
    {
        return $this->hasMany(Keluhan::class, 'id_teknisi', 'id_karyawan'); // Relasi ke kolom 'id_teknisi' di Keluhan
    }
}
