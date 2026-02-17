@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<section style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center; color: white;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Legal</span>
        <h1 class="section-title" style="color: white; margin-top: 1rem;">Política de Privacidad</h1>
        <p class="section-desc" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
           Tu privacidad es nuestra prioridad.
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 80px 0; background-color: #f8fafc;">
    <div class="container">
        <div class="benefit-card" style="text-align: left; padding: 48px; max-width: 900px; margin: 0 auto;">
            
            <p style="margin-bottom: 32px; color: var(--color-text-muted); line-height: 1.7;">En ZONIX, nos comprometemos a proteger tus datos personales. Esta política describe cómo recopilamos, usamos y compartimos tu información.</p>

            <div style="margin-bottom: 32px;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">Recopilación de Información</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    Recopilamos información que nos proporcionas directamente, como nombre, dirección y datos de contacto, así como información de uso de la aplicación para mejorar nuestros servicios.
                </p>
            </div>

            <div style="margin-bottom: 32px;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">Uso de la Información</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    Utilizamos tus datos para procesar tus pedidos, mejorar nuestros servicios y comunicarnos contigo sobre actualizaciones importantes. No vendemos tu información a terceros.
                </p>
            </div>

            <div>
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">Protección de Datos</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    Implementamos medidas de seguridad técnicas y organizativas para proteger tu información contra accesos no autorizados, pérdida o alteración.
                </p>
            </div>

        </div>
    </div>
</section>
@endsection
