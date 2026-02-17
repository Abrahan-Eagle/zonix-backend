@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<section style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center; color: white;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Legal</span>
        <h1 class="section-title" style="color: white; margin-top: 1rem;">Política de Cookies</h1>
        <p class="section-desc" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
           Cómo utilizamos las cookies para mejorar tu experiencia.
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 80px 0; background-color: #f8fafc;">
    <div class="container">
        <div class="benefit-card" style="text-align: left; padding: 48px; max-width: 900px; margin: 0 auto;">
            
            <p style="margin-bottom: 32px; color: var(--color-text-muted); line-height: 1.7;">Utilizamos cookies y tecnologías similares para mejorar la funcionalidad de nuestro sitio, analizar el tráfico y personalizar tu experiencia.</p>

            <div style="margin-bottom: 32px;">
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">¿Qué son las cookies?</h3>
                <p style="color: var(--color-text-muted); line-height: 1.7;">
                    Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas un sitio web. Nos permiten recordar tus acciones y preferencias durante un período de tiempo.
                </p>
            </div>

            <div>
                <h3 style="color: var(--color-dark-blue); font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">Tipos de cookies que usamos</h3>
                <ul style="border-left: 4px solid var(--color-primary); padding-left: 20px; color: var(--color-text-muted); display: flex; flex-direction: column; gap: 12px;">
                    <li><strong>Esenciales:</strong> Necesarias para el funcionamiento básico del sitio y la seguridad.</li>
                    <li><strong>Analíticas:</strong> Nos ayudan a entender cómo los usuarios interactúan con la web para mejorarla.</li>
                    <li><strong>Funcionales:</strong> Permiten recordar tus preferencias como idioma y ubicación.</li>
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection
