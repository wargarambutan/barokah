@extends('layouts.admin')

@section('content')
    <h2>Kirim Email ke {{ $karyawan->nama_lengkap }}</h2>

    <form action="{{ route('karyawan.kirimEmailDiterima', $karyawan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subject">Subjek</label>
            <!-- Isi otomatis subjek dengan data default dari controller -->
            <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject', $subject) }}"
                required>
        </div>

        <div class="form-group mt-3">
            <label for="messageContent">Isi Pesan</label>
            <!-- Isi otomatis pesan dengan data default dari controller -->
            <textarea name="messageContent" id="messageContent" rows="15" class="form-control" required>{{ old('messageContent', $messageContent) }}</textarea>
        </div>

        <button type="submit" id="btnSubmit" class="btn btn-primary mt-3">Kirim Email</button>
    </form>
@endsection
