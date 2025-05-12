<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Diyah - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .auth-container {
            max-width: 450px;
            margin: 0 auto;
            padding-top: 5rem;
        }
        .auth-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .auth-header {
            background-color: #4e73df;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 1.5rem;
        }
        .btn-toko {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
    </style>
</head>
<body style="background-color: #f8f9fc;">
    <div class="auth-container">
        <div class="auth-card card">
            <div class="auth-header card-header text-center">
                <h3 class="m-0">Toko Diyah</h3>
                <p class="mb-0 mt-1">@yield('auth-title')</p>
            </div>
            <div class="card-body p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>