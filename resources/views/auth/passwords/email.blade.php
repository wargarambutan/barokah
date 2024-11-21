@extends('layouts.auth')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Formulir reset password -->
    <form method="POST" action="{{ route('password.email') }}" class="pt-3">
        @csrf

        <!-- Input email -->
        <div class="form-group">
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                id="exampleInputEmail1" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Tombol kirim link reset password -->
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                Send Password Reset Link
            </button>
        </div>

        <!-- Tombol kembali -->
        <div class="mt-3">
            <a href="{{ route('login') }}" class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">
                Kembali
            </a>
        </div>
    </form>
@endsection
