<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ZONIX - Gas Doméstico a tu Alcance</title>
    <!-- CSS semántico y tokens extraídos -->
    <link href="{{ asset('css/landing-gas.css') }}" rel="stylesheet" />
  </head>
  <body>
    <!-- Navigation -->
    <nav class="main-nav">
      <div class="container nav-content">
        <!-- Logo -->
        <div class="nav-logo">
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
          <span class="logo-text">ZONIX</span>
        </div>

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
              <button class="btn btn-secondary">
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
              </button>
              <button class="btn btn-outline">
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
              </button>
            </div>

            <div class="social-proof">
              <div class="avatar-group">
                <img
                  alt="User"
                  class="avatar"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUbHK52UidsOjvRk4smdkCQpPXkOUHJyydauFyC2wIRzYIlr5BRcBYIhPUWEuK04jYwsXKDMkNWF8_XsdAoj4jOigmJlo42YMx454gdp1LTFVtTi_WC5AOiRHTUjF9eOyo049Tlpo0oL58bbpp1u0niaNlFbxgnmz8TEnP9WS653zxcIHOVv0JCt3PKeFeF9RekHrb6ORU6btiHIOWe7pOhEOo4n06R1TpOxV95VUm801GNEINgYGHsQn75cIXPCyFsoeGmpRTk1nY"
                />
                <img
                  alt="User"
                  class="avatar"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWW1Dwue5LNWWtaHQsZqsNiiw5PquXuRoXlR3qp2VRotY5PSUPYqYWibjhIAZRUOEpvkmKO4xQ858IKVLTuoEATjs_4Ha6N8gdc0GT5P9oNXuqkDXIn_4hyVv5EdXmmuMA0iaGDc_nNzi_MeSa9TGkBpkdzWw6re4FGkEFtGReGHGXYeBoECUTzb-Xb2UmuZlcfyBIYiLW-cxD1Ff8VT4aDfVl5urAYXjOu_BkzwGJ8DuDOJsvUq3Kpf5gyCkcPHTpI_UYHn2A2ELZ"
                />
                <img
                  alt="User"
                  class="avatar"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgdqlvyCk529Idyd1GGO6VLxOA9GpCY5nhIIvaGkbV_7JxYx4kJTBx8MEsQ6s4fGPl0JWp96M4tZrVlzMP3Ci1-AdIt8ZiN68ZBU0Pbma3G328YOH7Ed8bKQuQTP6mv5IDtuDYMvHSyVXsKg2UluGs-5Hw2MSk-6bY11TLCYPQj-R7W4pT5PimcpUZCKhaUuUH_iRpR_F33NusMSn6Ds2Ues-HUdmgZDwXQg7nBshTW8WN8KQ9kUcoOic7pSg1fZz3D-V64pl13WzV"
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
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuApqUlHJMvMzD6VOSlTI2Jh-6E0QFq5Flds_0omhUPADS26e5xnLqyFJTocozTT5Uca3xqT4EQiml0O_JwXxivSVnM3fEIEYP5HCoGTlSO46RKEpBmIBewb9dSPXJemu8kWeLJq13fe7TV_O0lvjLjEcEUuWStNlh4fmuwu3av9j99j42_7BPdLeMD4VTK0MNBkuCxqwBNDS0R6_ockgjC9WNyLddenKvEiVAFDcbaDVwb7BELwUjN7r0U94NoAwJI1bxzhLo1q-w4S"
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
            <div style="width: 64px; height: 4px; background-color: var(--color-primary); margin: 0 auto 24px auto;"></div>
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
            <button class="btn btn-primary mx-auto mb-4">
                Empezar Ahora
                <svg height="20" width="20" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </button>
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
        <div style="max-width: 896px; margin: 0 auto; position: relative;">
            <div style="background-color: white; padding: 48px; border-radius: 24px; border: 1px solid rgb(243, 244, 246); box-shadow: var(--card-shadow); position: relative;">
                <div style="position: absolute; top: -24px; left: 48px; width: 48px; height: 48px; background-color: var(--color-primary); border-radius: 16px; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);">
                    <svg class="w-6 h-6" fill="currentColor" width="24" height="24" viewbox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V12C14.017 12.5523 13.5693 13 13.017 13H11.017C10.4647 13 10.017 12.5523 10.017 12V9C10.017 7.89543 10.9124 7 12.017 7H19.017C20.1216 7 21.017 7.89543 21.017 9V15C21.017 17.7614 18.7784 20 16.017 20H15.017C14.4647 20 14.017 19.5523 14.017 19V21H14.017ZM3.017 21L3.017 18C3.017 16.8954 3.91243 16 5.017 16H8.017C8.56928 16 9.017 15.5523 9.017 15V9C9.017 8.44772 8.56928 8 8.017 8H4.017C3.46472 8 3.017 8.44772 3.017 9V12C3.017 12.5523 2.56928 13 2.017 13H0.017C-0.53528 13 -1.017 12.5523 -1.017 12V9C-1.017 7.89543 -0.12157 7 0.983 7H8.017C9.12157 7 10.017 7.89543 10.017 9V15C10.017 17.7614 7.77843 20 5.017 20H4.017C3.46472 20 3.017 19.5523 3.017 19V21H3.017Z"></path></svg>
                </div>
                <div style="display: flex; gap: 40px; align-items: center;">
                    <div style="position: relative; flex-shrink: 0;">
                        <img alt="Carlos Mendoza" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmKxbtiP-JDnnFfSZc-DcIsmZK5q4qSQQuoChdw2t3OaDiekogq-4dSZyVWtYrAjq275YJQPW61tAkJrbHECc421E6iEFSC-RCeLe_H1gq-YRcsRSxdbR95jLkPCqe4_ik-lPPZL_VddSpQOmpCeIM1ERCNdM6QE9z17-lb0e3zC9JXPh9vQnBO0PXcwylEMh-5S5m_Ah0Pxdj-4_lbWCjzhFewv9KD8vLFfJ23F5J4LIjaJJzEpWT2yK8rS6QAiqVp6obC7i6uAKl" style="width: 160px; height: 160px; border-radius: 50%; border: 8px solid rgb(248, 250, 252); object-fit: cover;">
                        <div style="position: absolute; bottom: 0; right: 0; background-color: rgb(249, 115, 22); color: white; fontsize: 8px; font-weight: 700; padding: 2px 8px; border-radius: 9999px; border: 2px solid white;">Verified</div>
                    </div>
                    <div style="flex-grow: 1;">
                        <p style="font-size: 24px; font-weight: 500; font-style: italic; color: var(--color-dark-blue); line-height: 1.625; margin-bottom: 24px;">"Antes, pedir el gas era un dolor de cabeza, nunca sabía cuándo llegaría el camión. Con ZONIX, tengo el control total, puedo programar mi pedido y mi familia está tranquila. Es la solución que Venezuela necesitaba."</p>
                        <div>
                            <h5 style="font-size: 18px; font-weight: 800; color: var(--color-dark-blue);">Carlos Mendoza</h5>
                            <p style="color: var(--color-primary); font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 4px;">
                                <svg class="w-3 h-3" fill="currentColor" width="12" height="12" viewbox="0 0 20 20"><path clip-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" fill-rule="evenodd"></path></svg>
                                Residente en Valencia, Carabobo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
             <div style="display: flex; justify-content: center; items-align: center; gap: 24px; margin-top: 48px;">
                <button style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid rgb(229, 231, 235); display: flex; align-items: center; justify-content: center; cursor: pointer; background: transparent;"><svg width="20" height="20" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg></button>
                <div style="display: flex; gap: 8px;">
                    <span style="width: 8px; height: 8px; border-radius: 50%; background-color: rgb(219, 234, 254);"></span>
                    <span style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--color-primary);"></span>
                    <span style="width: 8px; height: 8px; border-radius: 50%; background-color: rgb(219, 234, 254);"></span>
                </div>
                <button style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid rgb(229, 231, 235); display: flex; align-items: center; justify-content: center; cursor: pointer; background: transparent;"><svg width="20" height="20" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg></button>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-cta">
    <div class="container">
        <div class="cta-grid">
            <div style="padding-bottom: 96px;">
                <h2 class="cta-title">¿Listo para transformar tu hogar?</h2>
                <p class="cta-text">Únete a miles de venezolanos que ya gestionan su servicio de gas de forma inteligente, segura y sin colas.</p>
                <div class="store-btns">
                    <a class="btn-store-black" href="#">
                        <svg height="32" width="32" fill="currentColor" viewbox="0 0 24 24"><path d="M17.5 13.5c-.1 0-.1 0 0 0-.1-.1-.1-.1-.1-.1v-4.8c0-.1 0-.1.1-.1s.1 0 .1.1l2.4 2.4c.1.1.1.1 0 .1l-2.5 2.4zM7.5 3.5c-.1 0-.1 0 0 0-.1-.1-.1-.1-.1-.1v16.2c0 .1 0 .1.1.1s.1 0 .1-.1l8.1-8.1c.1-.1.1-.1 0-.1l-8.1-8z"></path></svg>
                        <div style="text-align: left; line-height: 1;">
                            <span style="font-size: 10px; text-transform: uppercase; font-weight: 700; color: rgba(255,255,255,0.6);">Descargar en</span>
                            <p style="font-size: 16px; font-weight: 700; margin: 0;">App Store</p>
                        </div>
                    </a>
                    <a class="btn-store-white" href="#">
                        <svg height="32" width="32" fill="currentColor" viewbox="0 0 24 24"><path d="M3 20.5v-17l14.5 8.5L3 20.5z"></path></svg>
                        <div style="text-align: left; line-height: 1;">
                            <span style="font-size: 10px; text-transform: uppercase; font-weight: 700; color: rgb(156, 163, 175);">Disponible en</span>
                            <p style="font-size: 16px; font-weight: 700; margin: 0;">Google Play</p>
                        </div>
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

<!-- Footer -->
<footer class="main-footer" id="contacto">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand -->
            <div>
                <div class="footer-logo">
                    <div class="logo-icon" style="background-color: var(--color-primary);">
                        <svg class="w-6 h-6" fill="none" height="24" stroke="white" viewbox="0 0 24 24" width="24"><path d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.99 7.99 0 0120 13a7.99 7.99 0 01-2.343 5.657z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                    </div>
                    <span class="footer-brand">ZONIX</span>
                </div>
                <p class="footer-desc">Revolucionando la gestión de servicios domésticos en Venezuela. Tecnología al servicio de tu tranquilidad.</p>
                <div class="social-links">
                    <a class="social-btn" href="#"><svg height="20" width="20" fill="currentColor" viewbox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
                    <a class="social-btn" href="#"><svg height="20" width="20" fill="currentColor" viewbox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path></svg></a>
                </div>
            </div>
            <!-- Links -->
            <div>
                <h6 class="footer-col-title">Empresa</h6>
                <ul class="footer-links">
                    <li><a class="footer-link" href="#">Sobre Nosotros</a></li>
                    <li><a class="footer-link" href="#">Blog</a></li>
                    <li><a class="footer-link" href="#">Carreras</a></li>
                    <li><a class="footer-link" href="#">Prensa</a></li>
                </ul>
            </div>
            <div>
                <h6 class="footer-col-title">Soporte</h6>
                <ul class="footer-links">
                    <li><a class="footer-link" href="#">Centro de Ayuda</a></li>
                    <li><a class="footer-link" href="#">Preguntas Frecuentes</a></li>
                    <li><a class="footer-link" href="#">Términos de Servicio</a></li>
                    <li><a class="footer-link" href="#">Política de Privacidad</a></li>
                </ul>
            </div>
            <!-- Contact -->
            <div>
                <h6 class="footer-col-title">Contacto</h6>
                <ul class="footer-links footer-contact">
                    <li>
                        <svg class="text-primary" fill="none" height="16" stroke="currentColor" viewbox="0 0 24 24" width="16"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        support@zonix.ve
                    </li>
                    <li>
                        <svg class="text-primary" fill="none" height="16" stroke="currentColor" viewbox="0 0 24 24" width="16"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        +58 412 123 4567
                    </li>
                    <li style="align-items: flex-start;">
                        <svg class="text-primary" fill="none" height="16" stroke="currentColor" style="margin-top: 4px;" viewbox="0 0 24 24" width="16"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        <span>Torre Empresarial, Av. Francisco de Miranda, Caracas, Venezuela</span>
                    </li>
                </ul>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(255, 255, 255, 0.05); padding-top: 48px; display: flex; justify-content: space-between; align-items: center;">
            <p style="font-size: 12px; color: rgb(107, 114, 128);">© 2023 ZONIX C.A. Todos los derechos reservados.</p>
            <div style="display: flex; gap: 32px; font-size: 12px; color: rgb(107, 114, 128);">
                <a class="footer-link" href="#">Privacidad</a>
                <a class="footer-link" href="#">Términos</a>
                <a class="footer-link" href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
