<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kesalahan Server</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">500</h1>
            <p class="fs-3"> <span class="text-danger">Ooops!</span> Terjadi Kesalahan di Server.</p>
            <p class="lead">
                Maaf, terjadi kesalahan di server kami. Kami sedang memperbaikinya.
            </p>
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
</body>

</html>
