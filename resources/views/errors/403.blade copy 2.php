{{-- resources/views/errors/403.blade.php --}}

@extends('layouts.app')

@section('title', 'Forbidden')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <h1>403 Forbidden</h1>
                    <p>You do not have permission to access this resource.</p>

                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <p><a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Admin Dashboard</a></p>
                        @elseif (Auth::user()->role == 'teknisi')
                            <p><a href="{{ route('teknisi') }}" class="btn btn-primary">Go to Technician Dashboard</a></p>
                        @elseif (Auth::user()->role == 'customer')
                            <p><a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Customer
                                    Dashboard</a></p>
                        @else
                            <p><a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a></p>
                        @endif
                    @else
                        <p><a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
