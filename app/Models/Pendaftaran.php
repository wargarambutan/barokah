<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    // Menentukan nama tabel yang digunakan
    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_lengkap',
        'nomor_telepon',
        'email',
        'nomor_ktp',
        'foto_ktp',
        'pendidikan_terakhir',
        'jurusan',
        'nama_institusi',
        'tahun_lulus',
        'posisi_terakhir',
        'nama_perusahaan_terakhir',
        'lama_bekerja',
        'deskripsi_pekerjaan',
        'posisi_yang_dilamar',
        'keahlian_khusus',
        'foto_karyawan',
        'unggah_cv',
        'ijazah',
        'sertifikat',
        'status',
    ];
}
