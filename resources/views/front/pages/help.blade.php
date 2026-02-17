@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<div class="page-header" style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Soporte ZONIX</span>
        <h1 class="section-title" style="color: white; margin-bottom: 16px; margin-top: 16px;">¿Cómo podemos ayudarte?</h1>
        <p style="color: rgba(255,255,255,0.8); font-size: 1.125rem; max-width: 600px; margin: 0 auto 32px auto;">
            Encuentra respuestas rápidas y gestiona tus solicitudes de servicio.
        </p>
        
        <!-- Search Bar -->
        <div style="max-width: 500px; margin: 0 auto; position: relative;">
            <input type="text" placeholder="Buscar ayuda..." style="width: 100%; padding: 16px 24px; padding-left: 50px; border-radius: 9999px; border: none; font-size: 1rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); outline: none;">
            <svg style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #9ca3af;" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
    </div>
</div>

<div class="container" style="padding: 80px 24px;">
    <!-- Categories Grid -->
    <div class="grid-3" style="margin-bottom: 64px; gap: 32px;">
        <!-- Card 1 -->
        <div class="benefit-card">
            <div class="card-icon" style="margin-bottom: 16px;">
                <svg class="w-6 h-6" fill="none" viewbox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark-blue); margin-bottom: 12px;">Pedidos y Gas</h3>
            <ul style="list-style: none; padding: 0; color: #4b5563;">
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">¿Cómo hacer un pedido?</a></li>
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Rastrear mi camión</a></li>
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Zonas de cobertura</a></li>
            </ul>
        </div>

        <!-- Card 2 -->
        <div class="benefit-card">
            <div class="card-icon" style="margin-bottom: 16px;">
                <svg class="w-6 h-6" fill="none" viewbox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
            </div>
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark-blue); margin-bottom: 12px;">Pagos y Facturación</h3>
            <ul style="list-style: none; padding: 0; color: #4b5563;">
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Métodos de pago aceptados</a></li>
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Ver mi historial de pagos</a></li>
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Solicitar factura</a></li>
            </ul>
        </div>

        <!-- Card 3 -->
        <div class="benefit-card">
            <div class="card-icon" style="margin-bottom: 16px;">
                <svg class="w-6 h-6" fill="none" viewbox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--color-dark-blue); margin-bottom: 12px;">Mi Cuenta</h3>
            <ul style="list-style: none; padding: 0; color: #4b5563;">
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Recuperar contraseña</a></li>
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Actualizar dirección</a></li>
                <li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-primary); text-decoration: none;">Problemas de inicio de sesión</a></li>
            </ul>
        </div>
    </div>

    <!-- Contact CTA -->
    <div style="background-color: #f8fafc; border-radius: 16px; padding: 48px; text-align: center; border: 1px solid #e2e8f0;">
        <h2 style="font-size: 1.5rem; color: var(--color-dark-blue); font-weight: 700; margin-bottom: 16px;">¿No encuentras lo que buscas?</h2>
        <p style="color: #64748b; margin-bottom: 32px; max-width: 600px; margin-left: auto; margin-right: auto;">
            Nuestro equipo de soporte está disponible de Lunes a Domingo de 7:00 AM a 8:00 PM.
        </p>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('pages.contact') }}" class="btn-solid-primary">Contactar Soporte</a>
            <a href="{{ route('pages.faq') }}" style="padding: 12px 24px; background: white; border: 1px solid #e2e8f0; color: var(--color-dark-blue); border-radius: 9999px; text-decoration: none; font-weight: 600;">Ver FAQs</a>
        </div>
    </div>
</div>
@endsection
