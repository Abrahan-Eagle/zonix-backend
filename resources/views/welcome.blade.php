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
        <a href="#" class="nav-logo">
          <div class="logo-icon">
            <svg
              class="w-5 h-5"
              fill="none"
              height="20"
              stroke="currentColor"
              viewbox="0 0 24 24"
              width="20"
            >
              <path
                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.99 7.99 0 0120 13a7.99 7.99 0 01-2.343 5.657z"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
              ></path>
              <path
                d="M9.879 16.121A3 3 0 1012.015 11L11 14l.879 2.121z"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
              ></path>
            </svg>
          </div>
          <span class="logo-text">ZONI<span style="color: #2563eb;">X</span></span>
        </a>

        <!-- Links -->
        <div class="nav-links">
          <a class="nav-link" href="#hero">Inicio</a>
          <a class="nav-link" href="#beneficios">Beneficios</a>
          <a class="nav-link" href="#como-funciona">Cómo Funciona</a>
          <a class="nav-link" href="#contacto">Contacto</a>
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

    <!-- Hero Section -->
    <section class="hero-section" id="hero">
      <div class="container">
        <div class="hero-grid">
          <!-- Left Content -->
          <div class="hero-content">
            <div class="hero-badge">
              <span class="dot"></span>
              Innovación en Servicios Públicos
            </div>

            <h1 class="hero-title">
              Gas Doméstico a tu Alcance, con
              <span class="text-primary">Seguridad</span> y
              <span class="text-primary">Confianza</span>
            </h1>

            <p class="hero-description">
              La plataforma que conecta a las familias venezolanas con el
              servicio de gas de manera rápida, transparente y moderna. Únete a
              la evolución del servicio público y olvídate de la incertidumbre.
            </p>

            <div class="hero-actions">
              <a href="#descargar" class="btn btn-secondary">
                <svg
                  height="20"
                  width="20"
                  fill="none"
                  stroke="currentColor"
                  viewbox="0 0 24 24"
                >
                  <path
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                  ></path>
                </svg>
                Descargar la App
              </a>
              <a href="#como-funciona" class="btn btn-outline">
                Saber Más
                <svg
                  height="16"
                  width="16"
                  fill="none"
                  stroke="currentColor"
                  viewbox="0 0 24 24"
                >
                  <path
                    d="M14 5l7 7m0 0l-7 7m7-7H3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                  ></path>
                </svg>
              </a>
            </div>

            <div class="social-proof">
              <div class="avatar-group">
                <img
                  alt="User"
                  class="avatar"
                  src="{{ asset('assets/front/images/landing/avatar-1.png') }}"
                />
                <img
                  alt="User"
                  class="avatar"
                  src="{{ asset('assets/front/images/landing/avatar-2.png') }}"
                />
                <img
                  alt="User"
                  class="avatar"
                  src="{{ asset('assets/front/images/landing/avatar-3.png') }}"
                />
                <div class="avatar-more">+2k</div>
              </div>
              <div>
                <p class="proof-text">
                  Familias confiando en
                  <span style="color: var(--color-primary); font-weight: 700"
                    >ZONIX</span
                  >
                  este mes.
                </p>
                <div class="rating">★★★★★</div>
              </div>
            </div>
          </div>

          <!-- Right Content (Image) -->
          <div class="hero-image-container">
            <div class="hero-bg-shape"></div>
            <img
              alt="Happy Family using Zonix"
              class="hero-img"
              src="{{ asset('assets/front/images/landing/hero-zonix.png') }}"
            />

            <!-- Floating Card -->
            <div class="floating-card">
              <div class="floating-content">
                <div class="floating-icon">
                  <svg
                    height="24"
                    width="24"
                    fill="none"
                    stroke="currentColor"
                    viewbox="0 0 24 24"
                  >
                    <path
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    style="
                      font-size: 10px;
                      color: rgb(156, 163, 175);
                      font-weight: 700;
                      text-transform: uppercase;
                      letter-spacing: 0.05em;
                    "
                  >
                    Cilindro 10KG
                  </p>
                  <p
                    style="
                      font-size: 14px;
                      font-weight: 800;
                      color: var(--color-dark-blue);
                    "
                  >
                    $ Disponible
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    </section>
    <!-- Services Section (New Module Request) -->
    <section class="section-services" id="servicios" style="padding-top: 80px; padding-bottom: 80px; background-color: #f8fafc;">
        <div class="container">
            <div class="text-center mb-16">
                <span class="section-badge">Soluciones Integrales</span>
                <h2 class="section-title">Adaptados a tu Necesidad</h2>
                <div class="separator-line"></div>
                <p class="section-desc">Gestionamos la distribución de gas en todas sus modalidades. Desde el cilindro doméstico hasta el suministro por tubería.</p>
            </div>

            <div class="grid-3">
                <!-- Service 1: Cilindros (GasDrácula Style) -->
                <div class="benefit-card" style="border-top: 4px solid var(--color-secondary);">
                    <div class="benefit-icon" style="background-color: #fff7ed; color: var(--color-secondary);">
                        <svg class="w-8 h-8" fill="none" height="32" stroke="currentColor" viewbox="0 0 24 24" width="32"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                    </div>
                    <h4 class="benefit-title">Gas por Cilindro</h4>
                    <p class="benefit-desc">El sistema clásico, modernizado. Solicita tu bombona de 10kg, 18kg o 43kg directamente desde la app. Seguimiento en tiempo real del camión.</p>
                    <ul style="margin-top: 16px; font-size: 14px; color: var(--color-text-muted); list-style: disc; padding-left: 20px;">
                        <li>Entrega programada por sector</li>
                        <li>Pago digital integrado</li>
                        <li>Validación QR</li>
                    </ul>
                </div>

                <!-- Service 2: Tubería (New Module) -->
                <div class="benefit-card" style="border-top: 4px solid var(--color-primary);">
                    <div class="benefit-icon" style="background-color: #eff6ff; color: var(--color-primary);">
                        <svg class="w-8 h-8" fill="none" height="32" stroke="currentColor" viewbox="0 0 24 24" width="32"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                    </div>
                    <h4 class="benefit-title">Gas Directo (Tubería)</h4>
                    <p class="benefit-desc">Gestión eficiente para residencias y comercios conectados a la red. Olvídate de la lectura manual y los cortes imprevistos.</p>
                    <ul style="margin-top: 16px; font-size: 14px; color: var(--color-text-muted); list-style: disc; padding-left: 20px;">
                        <li>Consulta de saldo y deuda</li>
                        <li>Reporte de averías</li>
                        <li>Histórico de consumo</li>
                    </ul>
                </div>

                <!-- Service 3: A Granel (Commercial) -->
                <div class="benefit-card" style="border-top: 4px solid #10b981;">
                    <div class="benefit-icon" style="background-color: #ecfdf5; color: #10b981;">
                        <svg class="w-8 h-8" fill="none" height="32" stroke="currentColor" viewbox="0 0 24 24" width="32"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                    </div>
                    <h4 class="benefit-title">Industrial y Granel</h4>
                    <p class="benefit-desc">Soluciones a medida para grandes consumidores, condominios y empresas. Suministro constante y monitoreado.</p>
                    <ul style="margin-top: 16px; font-size: 14px; color: var(--color-text-muted); list-style: disc; padding-left: 20px;">
                        <li>Tanques estacionarios</li>
                        <li>Facturación corporativa</li>
                        <li>Soporte dedicado</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<!-- Benefits Section -->
<section class="section-benefits" id="beneficios">
    <div class="container">
        <div class="text-center mb-16">
            <span class="section-badge">Gestión de Gas Doméstico</span>
            <h2 class="section-title">Simplifica tu vida con <span class="text-primary">ZONIX</span></h2>
            <p class="section-desc">La plataforma líder para la gestión segura, transparente y eficiente del suministro de gas en tu comunidad.</p>
        </div>

        <div class="text-center mb-20">
            <h3 class="section-title" style="font-size: 30px;">¿Por qué elegir ZONIX?</h3>
            <div class="separator-line"></div>
            <p class="section-desc">Transformamos la experiencia del servicio de gas doméstico con tecnología pensada para tu tranquilidad.</p>
        </div>

        <div class="grid-3">
            <!-- Benefit 1 -->
            <div class="benefit-card">
                <div class="benefit-shape"></div>
                <div class="benefit-icon">
                    <svg class="w-6 h-6" fill="none" height="24" stroke="currentColor" viewbox="0 0 24 24" width="24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>
                <h4 class="benefit-title">Seguridad Garantizada</h4>
                <p class="benefit-desc">Protocolos rigurosos y verificación de identidad en cada paso. Tu seguridad y la de tu familia es nuestra prioridad absoluta.</p>
            </div>
            <!-- Benefit 2 -->
            <div class="benefit-card">
                <div class="benefit-shape"></div>
                <div class="benefit-icon">
                    <svg class="w-6 h-6" fill="none" height="24" stroke="currentColor" viewbox="0 0 24 24" width="24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>
                <h4 class="benefit-title">Gestión Transparente</h4>
                <p class="benefit-desc">Precios claros, seguimiento en tiempo real y facturación digital. Sin costos ocultos ni sorpresas de último momento.</p>
            </div>
            <!-- Benefit 3 -->
            <div class="benefit-card">
                <div class="benefit-shape"></div>
                <div class="benefit-icon">
                    <svg class="w-6 h-6" fill="none" height="24" stroke="currentColor" viewbox="0 0 24 24" width="24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>
                <h4 class="benefit-title">Comunidad Unida</h4>
                <p class="benefit-desc">Organizamos las entregas por sectores para optimizar rutas, reducir tiempos de espera y beneficiar a todos los vecinos.</p>
            </div>
        </div>
    </div>
</section>

<!-- Middle Banner -->
<section class="section-banner">
    <div class="banner-pattern">
        <svg height="100%" width="100%"><pattern height="40" id="grid" patternunits="userSpaceOnUse" width="40"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"></path></pattern><rect fill="url(#grid)" height="100%" width="100%"></rect></svg>
    </div>
    <div class="container banner-content">
        <h2 class="banner-title">Energía que mueve hogares</h2>
        <p class="banner-desc">Conectando a miles de familias venezolanas con un servicio confiable.</p>
    </div>
</section>

<!-- How It Works -->
<section class="section-steps" id="como-funciona">
    <div class="container">
        <div class="text-center mb-20">
            <span class="section-badge">Fácil y Rápido</span>
            <h2 class="section-title">¿Cómo funciona el servicio?</h2>
            <p class="section-desc">Solo tres pasos te separan de una gestión eficiente de tu servicio de gas.</p>
        </div>

        <div class="steps-container">
            <div class="steps-line"></div>
            <div class="grid-3">
                <!-- Step 1 -->
                <div class="step-card">
                    <div class="step-icon-wrapper">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <svg class="w-8 h-8" fill="none" height="32" stroke="currentColor" viewbox="0 0 24 24" width="32"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </div>
                    </div>
                    <h4 class="step-title">Regístrate</h4>
                    <p class="step-desc">Crea tu cuenta en ZONIX en minutos. Verifica tus datos y únete a tu comunidad vecinal.</p>
                </div>
                <!-- Step 2 -->
                <div class="step-card">
                    <div class="step-icon-wrapper">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <svg class="w-8 h-8" fill="none" height="32" stroke="currentColor" viewbox="0 0 24 24" width="32"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </div>
                    </div>
                    <h4 class="step-title">Solicita tu Recarga</h4>
                    <p class="step-desc">Selecciona el tamaño de tu cilindro, verifica el precio y agenda tu solicitud desde la app.</p>
                </div>
                <!-- Step 3 -->
                <div class="step-card">
                    <div class="step-icon-wrapper">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <svg class="w-8 h-8" fill="none" height="32" stroke="currentColor" viewbox="0 0 24 24" width="32"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </div>
                    </div>
                    <h4 class="step-title">Recibe con Seguridad</h4>
                    <p class="step-desc">Espera el camión en la fecha programada. Confirma la entrega y califica el servicio.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-20">
            <a href="{{ route('register') }}" class="btn btn-primary mx-auto mb-4" style="display: inline-flex; align-items: center; text-decoration: none;">
                Empezar Ahora
                <svg height="20" width="20" fill="none" stroke="currentColor" viewbox="0 0 24 24" style="margin-left: 8px;"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </a>
            <p style="font-size: 12px; color: rgb(156, 163, 175);">Sin contratos forzosos. Cancela cuando quieras.</p>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section style="padding: 96px 0; background-color: white; overflow: hidden;">
    <div class="container">
        <div class="text-center mb-16">
            <span class="section-badge" style="background-color: rgb(239, 246, 255);">Comunidad ZONIX</span>
            <h2 class="section-title">Historias de Nuestra Comunidad</h2>
        </div>
        
        <div class="testimonial-carousel" style="position: relative; max-width: 800px; margin: 0 auto; overflow: hidden; padding: 24px;">
            <div class="testimonial-track" style="display: flex; transition: transform 0.5s ease;">
                
                <!-- Story 1 -->
                <div class="testimonial-card" style="min-width: 100%; flex: 0 0 100%;">
                    <div class="quote-icon-wrapper">
                        <svg class="w-6 h-6" fill="currentColor" width="24" height="24" viewbox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.1216 7 21.017 7.89543 21.017 9V15C21.017 17.7614 18.7784 20 16.017 20H15.017C14.4647 20 14.017 19.5523 14.017 19V21H14.017ZM3.017 21L3.017 18C3.017 16.8954 3.91243 16 5.017 16H8.017C8.56928 16 9.017 15.5523 9.017 15V9C9.017 8.44772 8.56928 8 8.017 8H4.017C3.46472 8 3.017 8.44772 3.017 9V12C3.017 12.5523 2.56928 13 2.017 13H0.017C-0.53528 13 -1.017 12.5523 -1.017 12V9C-1.017 7.89543 -0.12157 7 0.983 7H8.017C9.12157 7 10.017 7.89543 10.017 9V15C10.017 17.7614 7.77843 20 5.017 20H4.017C3.46472 20 3.017 19.5523 3.017 19V21H3.017Z"></path></svg>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-avatar-wrapper">
                            <div style="width: 64px; height: 64px; background-color: #e2e8f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: var(--color-primary);">CM</div>
                            <div class="badge-verified">Verificado</div>
                        </div>
                        <div style="flex-grow: 1;">
                            <p class="testimonial-text">"Antes, pedir el gas era un dolor de cabeza. Con ZONIX, tengo el control total, puedo programar mi pedido y mi familia está tranquila. Es la solución que Venezuela necesitaba."</p>
                            <div>
                                <h5 class="testimonial-author">Carlos Mendoza</h5>
                                <p class="testimonial-role">Residente en Valencia, Carabobo</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="testimonial-card" style="min-width: 100%; flex: 0 0 100%;">
                    <div class="quote-icon-wrapper">
                        <svg class="w-6 h-6" fill="currentColor" width="24" height="24" viewbox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.1216 7 21.017 7.89543 21.017 9V15C21.017 17.7614 18.7784 20 16.017 20H15.017C14.4647 20 14.017 19.5523 14.017 19V21H14.017ZM3.017 21L3.017 18C3.017 16.8954 3.91243 16 5.017 16H8.017C8.56928 16 9.017 15.5523 9.017 15V9C9.017 8.44772 8.56928 8 8.017 8H4.017C3.46472 8 3.017 8.44772 3.017 9V12C3.017 12.5523 2.56928 13 2.017 13H0.017C-0.53528 13 -1.017 12.5523 -1.017 12V9C-1.017 7.89543 -0.12157 7 0.983 7H8.017C9.12157 7 10.017 7.89543 10.017 9V15C10.017 17.7614 7.77843 20 5.017 20H4.017C3.46472 20 3.017 19.5523 3.017 19V21H3.017Z"></path></svg>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-avatar-wrapper">
                            <div style="width: 64px; height: 64px; background-color: #fee2e2; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #ef4444;">AR</div>
                            <div class="badge-verified">Verificado</div>
                        </div>
                        <div style="flex-grow: 1;">
                            <p class="testimonial-text">"La aplicación es súper fácil de usar. Por fin puedo pagar con tarjeta y olvidarme de buscar efectivo a última hora. El camión llegó justo cuando decía la app."</p>
                            <div>
                                <h5 class="testimonial-author">Ana Rodríguez</h5>
                                <p class="testimonial-role">Residente en Maracaibo, Zulia</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 3 -->
                <div class="testimonial-card" style="min-width: 100%; flex: 0 0 100%;">
                    <div class="quote-icon-wrapper">
                        <svg class="w-6 h-6" fill="currentColor" width="24" height="24" viewbox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.1216 7 21.017 7.89543 21.017 9V15C21.017 17.7614 18.7784 20 16.017 20H15.017C14.4647 20 14.017 19.5523 14.017 19V21H14.017ZM3.017 21L3.017 18C3.017 16.8954 3.91243 16 5.017 16H8.017C8.56928 16 9.017 15.5523 9.017 15V9C9.017 8.44772 8.56928 8 8.017 8H4.017C3.46472 8 3.017 8.44772 3.017 9V12C3.017 12.5523 2.56928 13 2.017 13H0.017C-0.53528 13 -1.017 12.5523 -1.017 12V9C-1.017 7.89543 -0.12157 7 0.983 7H8.017C9.12157 7 10.017 7.89543 10.017 9V15C10.017 17.7614 7.77843 20 5.017 20H4.017C3.46472 20 3.017 19.5523 3.017 19V21H3.017Z"></path></svg>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-avatar-wrapper">
                            <div style="width: 64px; height: 64px; background-color: #dbeafe; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #2563eb;">LG</div>
                            <div class="badge-verified">Verificado</div>
                        </div>
                        <div style="flex-grow: 1;">
                            <p class="testimonial-text">"Excelente atención al cliente. Tuve una duda con mi registro y me respondieron al momento por el chat de soporte. Se nota que les importa el usuario."</p>
                            <div>
                                <h5 class="testimonial-author">Luis González</h5>
                                <p class="testimonial-role">Residente en Chacao, Caracas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 4 -->
                <div class="testimonial-card" style="min-width: 100%; flex: 0 0 100%;">
                    <div class="quote-icon-wrapper">
                        <svg class="w-6 h-6" fill="currentColor" width="24" height="24" viewbox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.1216 7 21.017 7.89543 21.017 9V15C21.017 17.7614 18.7784 20 16.017 20H15.017C14.4647 20 14.017 19.5523 14.017 19V21H14.017ZM3.017 21L3.017 18C3.017 16.8954 3.91243 16 5.017 16H8.017C8.56928 16 9.017 15.5523 9.017 15V9C9.017 8.44772 8.56928 8 8.017 8H4.017C3.46472 8 3.017 8.44772 3.017 9V12C3.017 12.5523 2.56928 13 2.017 13H0.017C-0.53528 13 -1.017 12.5523 -1.017 12V9C-1.017 7.89543 -0.12157 7 0.983 7H8.017C9.12157 7 10.017 7.89543 10.017 9V15C10.017 17.7614 7.77843 20 5.017 20H4.017C3.46472 20 3.017 19.5523 3.017 19V21H3.017Z"></path></svg>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-avatar-wrapper">
                            <div style="width: 64px; height: 64px; background-color: #f3e8ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #9333ea;">CP</div>
                            <div class="badge-verified">Verificado</div>
                        </div>
                        <div style="flex-grow: 1;">
                            <p class="testimonial-text">"Lo que más me gusta es poder rastrear la unidad en tiempo real. Ya no tengo que estar todo el día asomada en la ventana o preguntando a los vecinos."</p>
                            <div>
                                <h5 class="testimonial-author">Carmen Pérez</h5>
                                <p class="testimonial-role">Residente en Barquisimeto, Lara</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 5 -->
                <div class="testimonial-card" style="min-width: 100%;">
                    <div class="quote-icon-wrapper">
                        <svg class="w-6 h-6" fill="currentColor" width="24" height="24" viewbox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.1216 7 21.017 7.89543 21.017 9V15C21.017 17.7614 18.7784 20 16.017 20H15.017C14.4647 20 14.017 19.5523 14.017 19V21H14.017ZM3.017 21L3.017 18C3.017 16.8954 3.91243 16 5.017 16H8.017C8.56928 16 9.017 15.5523 9.017 15V9C9.017 8.44772 8.56928 8 8.017 8H4.017C3.46472 8 3.017 8.44772 3.017 9V12C3.017 12.5523 2.56928 13 2.017 13H0.017C-0.53528 13 -1.017 12.5523 -1.017 12V9C-1.017 7.89543 -0.12157 7 0.983 7H8.017C9.12157 7 10.017 7.89543 10.017 9V15C10.017 17.7614 7.77843 20 5.017 20H4.017C3.46472 20 3.017 19.5523 3.017 19V21H3.017Z"></path></svg>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-avatar-wrapper">
                            <div style="width: 64px; height: 64px; background-color: #ffedd5; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #c2410c;">JT</div>
                            <div class="badge-verified">Verificado</div>
                        </div>
                        <div style="flex-grow: 1;">
                            <p class="testimonial-text">"Solía desconfiar de pagar por adelantado, pero con ZONIX el proceso es transparente y seguro. Me llega mi recibo al instante. 100% recomendado."</p>
                            <div>
                                <h5 class="testimonial-author">José Torres</h5>
                                <p class="testimonial-role">Residente en Puerto La Cruz, Anzoátegui</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
             <div class="slider-controls">
                <button class="slider-btn" onclick="prevSlide()"><svg width="20" height="20" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg></button>
                <div class="slider-dots">
                    <span class="dot-indicator active" onclick="goToSlide(0)"></span>
                    <span class="dot-indicator" onclick="goToSlide(1)"></span>
                    <span class="dot-indicator" onclick="goToSlide(2)"></span>
                    <span class="dot-indicator" onclick="goToSlide(3)"></span>
                    <span class="dot-indicator" onclick="goToSlide(4)"></span>
                </div>
                <button class="slider-btn" onclick="nextSlide()"><svg width="20" height="20" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg></button>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-cta" id="descargar">
    <div class="container">
        <div class="cta-grid">
            <div style="padding-bottom: 96px;">
                <h2 class="cta-title">¿Listo para transformar tu hogar?</h2>
                <p class="cta-text">Únete a miles de venezolanos que ya gestionan su servicio de gas de forma inteligente, segura y sin colas.</p>
                <div class="store-btns">
                    <a href="javascript:void(0)" onclick="alert('La App de ZONIX estará disponible muy pronto en App Store.')" style="transition: transform 0.2s; display: inline-block;">
                        <img src="{{ asset('assets/front/images/badges/app-store-badge.png') }}" alt="Descargar en App Store" style="height: 54px; width: auto; border-radius: 8px;">
                    </a>
                    <a href="javascript:void(0)" onclick="alert('La App de ZONIX estará disponible muy pronto en Google Play.')" style="transition: transform 0.2s; display: inline-block;">
                        <img src="{{ asset('assets/front/images/badges/google-play-badge.png') }}" alt="Disponible en Google Play" style="height: 54px; width: auto; border-radius: 8px;">
                    </a>
                </div>
            </div>
            <div style="position: relative;">
                <div class="cta-shape"></div>
                <div class="cta-mockup">
                    <div style="height: 24px; background-color: rgb(31, 41, 55); width: 33%; margin: 8px auto 0 auto; border-radius: 9999px;"></div>
                    <div style="padding: 24px;">
                        <div style="width: 100%; height: 128px; background-color: rgba(255, 255, 255, 0.1); border-radius: 16px; margin-bottom: 16px;"></div>
                        <div style="width: 66%; height: 16px; background-color: rgba(255, 255, 255, 0.1); border-radius: 9999px; margin-bottom: 8px;"></div>
                        <div style="width: 100%; height: 16px; background-color: rgba(255, 255, 255, 0.1); border-radius: 9999px; margin-bottom: 32px;"></div>
                        <div style="width: 100%; height: 160px; background-color: rgba(255, 255, 255, 0.1); border-radius: 16px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.dot-indicator');
    const track = document.querySelector('.testimonial-track');
    const totalSlides = slides.length;

    function updateCarousel() {
        track.style.transform = `translateX(-${currentSlide * 100}%)`;
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
    }

    // Auto slide every 5 seconds
    setInterval(nextSlide, 5000);
</script>

<!-- Footer -->
<!-- Footer -->
@include('front.partials.footer')
</body>
</html>
