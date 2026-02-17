@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<section style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center; color: white;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Medios</span>
        <h1 class="section-title" style="color: white; margin-top: 1rem;">Sala de Prensa</h1>
        <p class="section-desc" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
           Recursos para medios de comunicación y comunicados oficiales.
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 120px 0; background-color: #f8fafc; text-align: center;">
    <div class="container">
        <div style="background: white; padding: 60px; border-radius: 24px; max-width: 600px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
            <div style="font-size: 4rem; margin-bottom: 24px;">📰</div>
            <h2 style="font-size: 2rem; font-weight: 800; color: var(--color-dark-blue); margin-bottom: 16px;">Próximamente</h2>
            <p style="color: var(--color-text-muted); margin-bottom: 32px;">Estamos organizando nuestro kit de prensa. Contáctanos para consultas directas.</p>
            <a href="{{ route('pages.contact') }}" class="btn btn-primary">Contactar Prensa</a>
        </div>
    </div>
</section>
@endsection
