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
            overflow-x: hidden; 
        }
        
        /* Layout Structure */
        #wrapper { width: 100%; position: relative; }
        
        /* Topbar */
        .topbar { 
            position: fixed; 
            width: 100%; 
            height: 70px; 
            z-index: 50; 
            background: linear-gradient(to right, #1e88e5, #4fc3f7); 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .navbar-header { 
            width: 240px; 
            height: 70px; 
            background: rgba(0,0,0,0.05); /* Subtle darken */
            display: flex;
            align-items: center;
            justify-content: center;
            float: left;
        }
        .navbar-brand b { 
            font-size: 24px; 
            color: white; 
            font-weight: 600; 
            letter-spacing: 1px;
        }
        
        /* Sidebar */
        .left-sidebar { 
            position: fixed; 
            width: 240px; 
            height: 100%; 
            top: 0; 
            padding-top: 70px; 
            background: #ffffff; 
            z-index: 40; 
            box-shadow: 1px 0 20px rgba(0,0,0,0.08); 
        }
        .sidebar-nav ul { padding: 10px 0; margin: 0; list-style: none; }
        .sidebar-nav > ul > li { margin-bottom: 5px; }
        .sidebar-nav > ul > li > a { 
            display: flex; 
            align-items: center;
            padding: 12px 25px; 
            color: #607d8b; 
            text-decoration: none; 
            font-size: 15px; 
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
        }
        .sidebar-nav > ul > li > a:hover, 
        .sidebar-nav > ul > li > a.active { 
            color: #1e88e5; 
            background: #f2f7f8;
            border-left: 3px solid #1e88e5;
        }
        .sidebar-nav > ul > li > a i { margin-right: 12px; font-size: 18px; }
        
        /* Page Content */
        .page-wrapper { 
            margin-left: 240px; 
            padding-top: 90px; /* 70px header + 20px space */
            padding-bottom: 60px; 
            min-height: 100vh; 
            padding-right: 20px;
            padding-left: 20px;
            transition: all 0.3s ease;
        }
        
        /* Cards & UI Elements */
        .card { 
            background: #fff; 
            margin-bottom: 30px; 
            border: none; 
            border-radius: 10px; 
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); 
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover { 
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); 
            transform: translateY(-2px);
        }
        .card-body { padding: 35px; }
        .card-title { 
            margin-bottom: 20px; 
            font-size: 18px; 
            font-weight: 500; 
            color: #2b2b2b; 
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Badges & Buttons */
        .badge { font-weight: 500; padding: 6px 12px; border-radius: 4px; }
        .badge-priority-alta { background-color: #ef5350; color: white; }
        .badge-priority-media { background-color: #ffb22b; color: white; }
        .badge-priority-baja { background-color: #26c6da; color: white; }
        
        .btn-primary {
            background: linear-gradient(to right, #1e88e5, #4fc3f7);
            border: none;
            box-shadow: 0 4px 6px rgba(50,150,250,0.2);
        }
        .btn-primary:hover {
            box-shadow: 0 6px 10px rgba(50,150,250,0.3);
            transform: translateY(-1px);
        }

        /* Responsive */
        @media(max-width: 768px) {
            .navbar-header { width: 60px; }
            .navbar-brand b { display: none; } 
            .left-sidebar { width: 60px; text-align: center; }
            .sidebar-nav > ul > li > a { padding: 12px 0; justify-content: center; }
            .sidebar-nav > ul > li > a span { display: none; }
            .sidebar-nav > ul > li > a i { margin: 0; }
            .page-wrapper { margin-left: 60px; }
        }
    </style>
    @livewireStyles
</head>
<body class="fix-header fix-sidebar">
    <div id="wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark h-100">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <!-- Logo icon -->
                        <i class="bi bi-headset text-white fs-2 d-md-none"></i>
                        <!-- Logo text -->
                        <b class="d-none d-md-block">AdminPro</b>
                    </a>
                </div>
                <!-- Navbar Items -->
                <div class="navbar-collapse d-flex justify-content-end px-4">
                     <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <span class="text-white me-3 d-none d-md-inline">Hola, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <a class="btn btn-outline-light btn-sm rounded-pill px-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bi bi-power"></i> Salir
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"><span class="hide-menu ps-4 text-muted small text-uppercase fw-bold">Personal</span></li>
                        <li> 
                            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="bi bi-speedometer2"></i> 
                                <span>Dashboard</span>
                            </a> 
                        </li>
                        <li> 
                            <a href="{{ route('tickets.index') }}" class="{{ request()->routeIs('tickets.*') ? 'active' : '' }}">
                                <i class="bi bi-ticket-perforated"></i> 
                                <span>Tickets</span>
                            </a> 
                        </li>
                        <li class="nav-small-cap mt-3"><span class="hide-menu ps-4 text-muted small text-uppercase fw-bold">Cuenta</span></li>
                        <li> 
                            <a href="{{ route('profile.edit') }}">
                                <i class="bi bi-person-circle"></i> 
                                <span>Perfil</span>
                            </a> 
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
             <!-- Breadcrumb or Title -->
             @if(isset($header))
                <div class="row page-titles mb-3">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">{{ $header }}</h3>
                    </div>
                </div>
             @endif

            {{ $slot }}
            
            <footer class="footer text-center text-muted mt-5">
                © 2026 Mesa de Ayuda - Ian Cler
            </footer>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>
