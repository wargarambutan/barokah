@extends('layouts.admin')

@section('content')
    <h2>Konfigurasi Email Penolakan untuk {{ $karyawan->nama_lengkap }}</h2>

    <form action="{{ route('admin.kirimEmailDitolak', $karyawan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subject">Subjek Email</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject', $subject) }}"
                required>
        </div>

        <div class="form-group">
            <label for="messageContent">Isi Pesan</label>
            <textarea name="messageContent" id="messageContent" class="form-control" rows="15" required>{{ old('messageContent', $messageContent) }}</textarea>
        </div>

        <button type="submit" id="btnSubmit" class="btn btn-primary mt-3">Kirim Email Penolakan</button>
    </form>
@endsection
