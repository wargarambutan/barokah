@extends('layouts.auth')

@section('content')
    <!-- Formulir login -->

    <form method="POST" action="{{ route('login') }}" class="pt-3">
        @csrf
        <!-- Input email -->
        <div class="form-group">
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                id="exampleInputEmail1" name="email" placeholder="Email" value="{{ old('email') }}" required>
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

        <!-- Tombol login -->
        <div class="mt-3">
            <button type="submit" id="btnSubmit"
                class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">SIGN
                IN</button>
        </div>
        <div class="mt-3">
            <a href="{{ route('index') }}" class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">
                Kembali
            </a>
            <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
        </div>
    </form>
@endsection
