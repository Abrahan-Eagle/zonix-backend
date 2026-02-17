@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<section style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center; color: white;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Soporte</span>
        <h1 class="section-title" style="color: white; margin-top: 1rem;">Preguntas Frecuentes</h1>
        <p class="section-desc" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
           Resolvemos tus dudas sobre el servicio.
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 80px 0; background-color: #f8fafc;">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto; display: grid; gap: 24px;">
        
            <div class="benefit-card" style="padding: 32px; text-align: left;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; display: flex; align-items: center; gap: 12px;">
                    <span style="color: var(--color-primary);">01.</span> ¿Cómo solicito una bombona?
                </h3>
                <p style="color: var(--color-text-muted); padding-left: 40px;">Descarga la app ZONIX, regístrate, selecciona tu ubicación y el tipo de cilindro que necesitas. Podrás ver el estado de tu pedido en tiempo real y el repartidor asignado.</p>
            </div>

            <div class="benefit-card" style="padding: 32px; text-align: left;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; display: flex; align-items: center; gap: 12px;">
                    <span style="color: var(--color-primary);">02.</span> ¿Cuáles son los métodos de pago?
                </h3>
                <p style="color: var(--color-text-muted); padding-left: 40px;">Aceptamos pago móvil, transferencias bancarias y pagos en línea a través de nuestra plataforma segura. También estamos integrando opciones de pago en divisas.</p>
            </div>

            <div class="benefit-card" style="padding: 32px; text-align: left;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; display: flex; align-items: center; gap: 12px;">
                    <span style="color: var(--color-primary);">03.</span> ¿Qué hago si tengo una fuga de gas?
                </h3>
                <p style="color: var(--color-text-muted); padding-left: 40px;">Por favor, contacta inmediatamente a nuestro servicio de emergencias o a los bomberos locales. Cierra la llave de paso, ventila el área y no enciendas interruptores eléctricos.</p>
            </div>

            <div class="benefit-card" style="padding: 32px; text-align: left;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; display: flex; align-items: center; gap: 12px;">
                    <span style="color: var(--color-primary);">04.</span> ¿Atienden a condominios?
                </h3>
                <p style="color: var(--color-text-muted); padding-left: 40px;">Sí, ofrecemos planes especiales para condominios y servicio de llenado de tanques estacionarios a granel. Contáctanos para una cotización personalizada.</p>
            </div>

        </div>
    </div>
</section>
@endsection
