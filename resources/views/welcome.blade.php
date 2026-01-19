<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Mesa de Ayuda') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #eef5f9; 
            color: #3e5569;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
            border-top: 5px solid #1e88e5;
        }
        .btn-primary {
            background: linear-gradient(to right, #1e88e5, #4fc3f7);
            border: none;
            box-shadow: 0 4px 6px rgba(50,150,250,0.2);
            padding: 10px 30px;
            font-weight: 500;
        }
        .btn-primary:hover {
            box-shadow: 0 6px 10px rgba(50,150,250,0.3);
            transform: translateY(-1px);
        }
        .brand-icon {
            font-size: 50px;
            color: #1e88e5;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="brand-icon">
            <i class="bi bi-headset"></i>
        </div>
        <h2 class="fw-bold mb-3">Mesa de Ayuda</h2>
        <p class="text-muted mb-4">Ingresar a Mesa de Ayuda</p>
        
        <div class="d-grid gap-2">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary text-white rounded-pill">Ir al Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary text-white rounded-pill">Iniciar Sesión</a>
                @endauth
            @endif
        </div>
    </div>

</body>
</html>
