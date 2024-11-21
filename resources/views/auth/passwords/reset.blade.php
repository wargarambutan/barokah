@extends('layouts.auth')

@section('content')
    <!-- Formulir reset password -->
    <form method="POST" action="{{ route('password.update') }}" class="pt-3">
        @csrf

        <!-- Token reset password -->
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Input email -->
        <div class="form-group">
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                id="exampleInputEmail1" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Input password -->
        <div class="form-group">
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                id="exampleInputPassword1" name="password" placeholder="Password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Input konfirmasi password -->
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="password-confirm" name="password_confirmation"
                placeholder="Confirm Password" required>
        </div>

        <!-- Tombol reset password -->
        <div class="mt-3">
            <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                Reset Password
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
