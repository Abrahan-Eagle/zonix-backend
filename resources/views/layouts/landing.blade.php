<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ZONIX - Gas Doméstico a tu Alcance</title>
    <meta name="description" content="La plataforma que conecta a las familias venezolanas con el servicio de gas de manera rápida, transparente y moderna." />
    
    <!-- Open Graph / Meta Social -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ZONIX - Gas Doméstico a tu Alcance" />
    <meta property="og:description" content="Gestiona tu servicio de gas doméstico con seguridad y confianza. Únete a la evolución del servicio público." />
    <meta property="og:image" content="{{ asset('assets/front/images/landing/hero-zonix.png') }}" />
    <meta name="twitter:card" content="summary_large_image" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/front/images/Favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/front/images/Favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/front/images/Favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/front/images/Favicon/site.webmanifest') }}">

    <!-- CSS semántico y tokens extraídos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('css/landing-gas.css') }}" rel="stylesheet" />
</head>
<body>
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container nav-content">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="nav-logo">
                <div class="logo-icon">
                    <svg class="w-5 h-5" fill="none" height="20" stroke="currentColor" viewbox="0 0 24 24" width="20">
                        <path d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.99 7.99 0 0120 13a7.99 7.99 0 01-2.343 5.657z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        <path d="M9.879 16.121A3 3 0 1012.015 11L11 14l.879 2.121z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </div>
                <span class="logo-text">ZONI<span style="color: #2563eb;">X</span></span>
            </a>

            <!-- Links -->
            <div class="nav-links">
                <a class="nav-link" href="{{ url('/') }}#hero">Inicio</a>
                <a class="nav-link" href="{{ url('/') }}#beneficios">Beneficios</a>
                <a class="nav-link" href="{{ url('/') }}#como-funciona">Cómo Funciona</a>
                <a class="nav-link" href="{{ url('/') }}#contacto">Contacto</a>
            </div>

            <!-- Actions -->
            <div class="nav-actions">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn-login">Dashboard</a>
                    @else
                        <a class="btn-login" href="{{ route('login') }}">Iniciar Sesión</a>

                        @if (Route::has('register'))
                            <a class="btn-register" href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('front.partials.footer')
    
</body>
</html>
