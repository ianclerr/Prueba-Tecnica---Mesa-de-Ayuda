<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #eef5f9; font-family: 'Roboto', sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .login-box { width: 400px; margin: 0 auto; }
        .card { border: 0px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h3 class="box-title m-b-0">Mesa de Ayuda</h3>
                    <small>Ingrese sus credenciales</small>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
