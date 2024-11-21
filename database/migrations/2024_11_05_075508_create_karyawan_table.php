<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->text('alamat_lengkap');
            $table->string('nomor_telepon');
            $table->string('email')->unique();
            $table->string('nomor_ktp')->unique();
            $table->string('foto_ktp')->nullable();
            $table->string('pendidikan_terakhir');
            $table->string('jurusan')->nullable();
            $table->string('nama_institusi')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->string('posisi_terakhir')->nullable();
            $table->string('nama_perusahaan_terakhir')->nullable();
            $table->string('lama_bekerja')->nullable();
            $table->text('deskripsi_pekerjaan')->nullable();
            $table->string('posisi_yang_dilamar');
            $table->string('keahlian_khusus')->nullable();
            $table->string('gaji_diharapkan')->nullable();
            $table->string('portofolio')->nullable();
            $table->string('foto_karyawan')->nullable();
            $table->string('unggah_cv')->nullable();
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
