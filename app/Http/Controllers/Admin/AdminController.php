<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Mail\KaryawanDiterimaMail;
use App\Mail\KaryawanDitolakMail;
use App\Models\Karyawan;
use App\Models\Konfigurasi;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getStatusPendaftaran()
    {
        $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();
        return $konfigurasi ? $konfigurasi->nilai : 'Tutup';
    }

    public function index()
    {
        // Mengambil jumlah karyawan berdasarkan status
        $totalKaryawan = Pendaftaran::count();
        $menungguVerifikasi = Pendaftaran::where('status', 'Menunggu Verifikasi')->count();
        $diterima = Pendaftaran::where('status', 'Diterima')->count();
        $ditolak = Pendaftaran::where('status', 'Ditolak')->count();

        // Menghitung persentase
        $percentageDiterima = $totalKaryawan > 0 ? ($diterima / $totalKaryawan) : 0;
        $percentageDitolak = $totalKaryawan > 0 ? ($ditolak / $totalKaryawan) : 0;
        $percentageMenunggu = $totalKaryawan > 0 ? ($menungguVerifikasi / $totalKaryawan) : 0;

        // $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();


        // Mengirim data ke view
        return view('admin.index', [
            'totalKaryawan' => $totalKaryawan,
            'menungguVerifikasi' => $menungguVerifikasi,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'percentageDiterima' => $percentageDiterima,
            'percentageDitolak' => $percentageDitolak,
            'percentageMenunggu' => $percentageMenunggu,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    public function verifikasi()
    {
        // Ambil data karyawan yang statusnya "Menunggu Verifikasi"
        $karyawanMenunggu = Pendaftaran::where('status', 'Menunggu Verifikasi')->get();
        // $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();

        // Kirimkan data ke view dengan array
        return view('admin.pendaftaran.verifikasi', [
            'karyawanMenunggu' => $karyawanMenunggu,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }


    public function detail($id)
    {
        $karyawan = Pendaftaran::findOrFail($id);
        // $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();
        return view('admin.pendaftaran.detail', [
            'karyawan' => $karyawan,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }


    public function diterima()
    {
        // Ambil data karyawan dengan status Diterima
        $karyawanDiterima = Pendaftaran::where('status', 'Diterima')->get();

        // Kirim data ke view
        return view('admin.pendaftaran.diterima', [
            'karyawanDiterima' => $karyawanDiterima,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    public function detail_diterima($id)
    {
        $karyawan = Pendaftaran::findOrFail($id);
        return view('admin.pendaftaran.detail_diterima', [
            'karyawan' => $karyawan,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }


    public function ditolak()
    {
        // Ambil data karyawan dengan status Ditolak
        $karyawanDitolak = Pendaftaran::where('status', 'Ditolak')->get();

        // Kirim data ke view
        return view('admin.pendaftaran.ditolak', [
            'karyawanDitolak' => $karyawanDitolak,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    public function detail_ditolak($id)
    {
        $karyawan = Pendaftaran::findOrFail($id);
        return view('admin.pendaftaran.detail_ditolak', [
            'karyawan' => $karyawan,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    // AdminController.php




    public function updateStatus(Request $request, $id)
    {
        $karyawan = Pendaftaran::findOrFail($id);

        // Validasi status
        $request->validate([
            'status' => 'required|in:Menunggu Verifikasi,Diterima,Ditolak',
        ]);

        // Update status
        $karyawan->status = $request->status;
        $karyawan->save();

        // Kirim response JSON
        return response()->json(['success' => true]);
    }


    public function hapus($id)
    {
        $karyawan = Pendaftaran::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('verifikasi')->with('success', 'Data berhasil dihapus.');
    }

    public function kirimEmailDiterimaForm($id)
    {
        // Ambil data karyawan berdasarkan ID
        $karyawan = Pendaftaran::findOrFail($id);

        // Tentukan jadwal dan tempat interview atau onboarding
        $jadwalInterview = 'Senin, 13 November 2024 pukul 10:00 WIB';
        $tempatInterview = 'Kantor Barokah Net, Jl. Raya No. 123, Jakarta';

        // Tentukan subjek dan isi pesan default
        $subject = 'Selamat, Anda Diterima di Barokah Net!';
        $messageContent = "Halo, {$karyawan->nama_lengkap},\n\n" .
            "Selamat! Kami dengan senang hati menginformasikan bahwa Anda diterima di Barokah Net.\n\n" .
            "Berikut adalah jadwal interview atau onboarding Anda:\n" .
            "Jadwal: {$jadwalInterview}\n" .
            "Tempat: {$tempatInterview}\n\n" .
            "Kami menantikan kedatangan Anda. Jangan ragu untuk menghubungi kami jika ada pertanyaan.\n\n" .
            "Salam,\nTim Barokah Net";

        // Kirim data ke form
        return view('admin.pendaftaran.kirimEmailDiterima', [
            'karyawan' => $karyawan,
            'subject' => $subject,
            'messageContent' => $messageContent,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }



    public function kirimEmailDiterima(Request $request, $id)
    {
        // Ambil data karyawan berdasarkan ID
        $karyawan = Pendaftaran::findOrFail($id);

        // Ambil subjek dan isi pesan dari form
        $subject = $request->input('subject');
        $messageContent = $request->input('messageContent');

        // Kirim email
        Mail::to($karyawan->email)->send(new KaryawanDiterimaMail($subject, $messageContent));

        // Redirect kembali ke halaman daftar karyawan diterima dengan pesan sukses
        return redirect()->route('diterima')->with('success', 'Email pemberitahuan telah dikirim.');
    }

    public function kirimEmailDitolakForm($id)
    {
        // Ambil data karyawan berdasarkan ID
        $karyawan = Pendaftaran::findOrFail($id);

        // Tentukan subjek dan isi pesan default untuk penolakan
        $subject = 'Pemberitahuan Penolakan Pendaftaran';
        $messageContent = "Halo, {$karyawan->nama_lengkap},\n\n" .
            "Terima kasih atas minat Anda untuk bergabung dengan Barokah Net.\n\n" .
            "Setelah mempertimbangkan aplikasi Anda, kami menyesal untuk memberitahukan bahwa Anda tidak diterima untuk posisi ini.\n\n" .
            "Kami menghargai waktu dan usaha yang telah Anda investasikan dalam proses ini.\n\n" .
            "Semoga sukses untuk kesempatan lainnya di masa depan.\n\n" .
            "Salam,\nTim Barokah Net";

        // Kirim data ke form
        return view('admin.pendaftaran.kirimEmailDitolak', [
            'karyawan' => $karyawan,
            'subject' => $subject,
            'messageContent' => $messageContent,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    public function kirimEmailDitolak(Request $request, $id)
    {
        // Ambil data karyawan berdasarkan ID
        $karyawan = Pendaftaran::findOrFail($id);

        // Ambil subjek dan isi pesan dari form
        $subject = $request->input('subject');
        $messageContent = $request->input('messageContent');

        // Kirim email
        Mail::to($karyawan->email)->send(new KaryawanDitolakMail($subject, $messageContent));

        // Update status karyawan menjadi ditolak
        $karyawan->status = 'Ditolak';
        $karyawan->save();

        // Redirect kembali ke halaman daftar karyawan ditolak dengan pesan sukses
        return redirect()->route('ditolak')->with('success', 'Email pemberitahuan penolakan telah dikirim.');
    }

    public function laporan(Request $request)
    {
        // Mengambil bulan dan tahun dari input (jika ada)
        $bulan = $request->input('bulan', date('m')); // Default bulan adalah bulan sekarang
        $tahun = $request->input('tahun', date('Y')); // Default tahun adalah tahun sekarang

        $laporanKaryawan = Pendaftaran::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->whereIn('status', ['Diterima', 'Ditolak'])
            ->get();


        return view('admin.pendaftaran.laporan', [
            'laporanKaryawan' => $laporanKaryawan,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'statusPendaftaran' => $this->getStatusPendaftaran()
        ]);
    }

    public function cetakLaporan(Request $request)
    {
        $status = $request->input('status');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Filter data sesuai status, bulan, dan tahun yang dipilih
        $karyawan = Pendaftaran::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->whereIn('status', ['Diterima', 'Ditolak'])
            ->get();

        // Proses untuk mencetak laporan
        $pdf = Pdf::loadView('admin.pendaftaran.cetak-laporan', compact('karyawan', 'bulan', 'tahun', 'status'));

        // Jika data kosong, beri informasi tambahan di PDF
        if ($karyawan->isEmpty()) {
            // Tambahkan keterangan di dalam PDF
            return $pdf->setPaper('A4')->stream('Laporan-karyawan-kosong-' . $status . '-' . $bulan . '-' . $tahun . '.pdf');
        }

        // Jika data ditemukan, cetak seperti biasa
        return $pdf->stream('laporan-karyawan-' . $status . '-' . $bulan . '-' . $tahun . '.pdf');
    }

    public function ubahStatusPendaftaran()
    {
        // Ambil status pendaftaran
        $konfigurasi = Konfigurasi::where('nama_konfigurasi', 'status_pendaftaran')->first();

        // Periksa apakah status ada dan ubah nilainya
        if ($konfigurasi) {
            // Tentukan status baru
            $newStatus = $konfigurasi->nilai === 'Buka' ? 'Tutup' : 'Buka';

            // Update status di tabel konfigurasi
            $konfigurasi->update(['nilai' => $newStatus]);

            // Menyimpan status baru di session untuk menampilkan notifikasi di view
            session()->flash('status_pendaftaran', $newStatus);
        }

        // Redirect kembali ke halaman admin
        return redirect()->route('dashboard');
    }
}
