@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<section style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center; color: white;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Nuestra Esencia</span>
        <h1 class="section-title" style="color: white; margin-top: 1rem;">Sobre Nosotros</h1>
        <p class="section-desc" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
            Conoce la historia y misión detrás de ZONIX, la plataforma que revoluciona el gas doméstico.
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 80px 0;">
    <div class="container">
        <div class="grid-2" style="align-items: center; gap: 64px;">
            <div class="hero-image-container">
                <div class="hero-bg-shape" style="background-color: #f0f9ff;"></div>
                <img src="{{ asset('assets/front/images/landing/hero-zonix.png') }}" class="hero-img" alt="Sobre ZONIX">
            </div>
            
            <div>
                <h2 class="section-title" style="text-align: left;">Nuestra Misión</h2>
                <div class="separator-line" style="margin: 20px 0;"></div>
                <p class="section-desc" style="text-align: left; margin-bottom: 24px;">
                    En ZONIX, nuestra misión es transformar la distribución de gas en Venezuela mediante la tecnología. Buscamos eliminar la incertidumbre, las colas y los pagos complejos, ofreciendo una solución digital, transparente y eficiente.
                </p>
                
                <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark-blue); margin-bottom: 16px;">Nuestros Valores</h3>
                <ul style="display: flex; flex-direction: column; gap: 16px;">
                    <li style="display: flex; align-items: center; gap: 12px;">
                        <span style="background: var(--color-primary); color: white; padding: 4px; border-radius: 50%; display: flex;"><svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                        <span style="color: var(--color-text-muted);">Innovación Constante</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 12px;">
                        <span style="background: var(--color-primary); color: white; padding: 4px; border-radius: 50%; display: flex;"><svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                        <span style="color: var(--color-text-muted);">Transparencia Total</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 12px;">
                        <span style="background: var(--color-primary); color: white; padding: 4px; border-radius: 50%; display: flex;"><svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                        <span style="color: var(--color-text-muted);">Compromiso Social</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
