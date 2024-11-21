<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KaryawanKonfirmasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $karyawan;
    public $konfirmasiMessage;

    public function __construct($karyawan, $konfirmasiMessage)
    {
        $this->karyawan = $karyawan;
        $this->konfirmasiMessage = $konfirmasiMessage;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Jadwal dan Tempat Interview - ' . $this->karyawan->nama_lengkap,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.karyawanKonfirmasi',
            with: [
                'karyawan' => $this->karyawan,
                'konfirmasiMessage' => $this->konfirmasiMessage
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
