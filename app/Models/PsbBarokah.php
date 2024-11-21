<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsbBarokah extends Model
{
    use HasFactory;

    protected $table = 'psb_barokah';

    public $timestamps = false;

    protected $fillable = [
        'Timestamp',
        'Email_Address',
        'Koordinat_ONT',
        'NUP_Id',
        'Nama',
        'PPPoE',
        'NIK',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Kelamin',
        'Dusun',
        'RT_RW',
        'Kel_Desa',
        'Kecamatan',
        'Kabupaten_Kota',
        'Paket',
        'Tapak_Depan_Rumah',
        'Foto_KTP',
        'No_WA',
        'Keterangan',
        'Tenaga_Ahli'
    ];
}
