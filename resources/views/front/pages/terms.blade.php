@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<section style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center; color: white;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Legal</span>
        <h1 class="section-title" style="color: white; margin-top: 1rem;">Términos de Servicio</h1>
        <p class="section-desc" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
            Última actualización: Febrero 2026
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 80px 0; background-color: #f8fafc;">
    <div class="container">
        <div class="benefit-card" style="text-align: left; padding: 48px; max-width: 900px; margin: 0 auto;">
            
            <div style="margin-bottom: 32px;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">1. Uso del Servicio</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    ZONIX proporciona una plataforma para la gestión y solicitud de gas doméstico. Te comprometes a utilizar el servicio de manera legal y ética. El acceso a nuestros servicios está sujeto a la disponibilidad en tu zona.
                </p>
            </div>

            <div style="margin-bottom: 32px;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">2. Registro de Usuario</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    Para acceder a ciertas funciones, debes registrarte y proporcionar información veraz y actualizada. Eres responsable de mantener la confidencialidad de tu cuenta y contraseña.
                </p>
            </div>

            <div style="margin-bottom: 32px;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">3. Pagos y Tarifas</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    Los precios de los servicios se muestran en la aplicación y están sujetos a cambios según las regulaciones vigentes. Todos los pagos se procesan de forma segura a través de nuestros aliados bancarios.
                </p>
            </div>

            <div>
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">4. Limitación de Responsabilidad</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    ZONIX no se hace responsable de daños indirectos derivados del uso de la plataforma, salvo en casos de negligencia grave comprobada por parte de nuestro personal.
                </p>
            </div>

        </div>
    </div>
</section>
@endsection
