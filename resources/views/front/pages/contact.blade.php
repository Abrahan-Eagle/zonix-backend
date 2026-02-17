@extends('layouts.landing')

@section('content')
<!-- Page Header -->
<section style="background-color: var(--color-primary); padding-top: 120px; padding-bottom: 60px; text-align: center; color: white;">
    <div class="container">
        <span class="section-badge" style="background: rgba(255,255,255,0.2); color: white;">Contáctanos</span>
        <h1 class="section-title" style="color: white; margin-top: 1rem;">Estamos aquí para ayudar</h1>
        <p class="section-desc" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
            ¿Tienes dudas o necesitas soporte? Nuestro equipo está listo para atenderte.
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 80px 0; background-color: #f8fafc;">
    <div class="container">
        <div class="grid-2" style="gap: 48px; align-items: start;">
            
            <!-- Info Cards -->
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <div class="benefit-card" style="display: flex; align-items: center; gap: 20px; text-align: left; padding: 32px;">
                    <div class="benefit-icon" style="background: #eff6ff; color: var(--color-primary); margin: 0;">
                       <svg class="w-6 h-6" fill="none" height="24" stroke="currentColor" viewbox="0 0 24 24" width="24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--color-dark-blue); margin-bottom: 4px;">Email</h4>
                        <p style="color: var(--color-text-muted);">support@zonix.ve</p>
                    </div>
                </div>

                <div class="benefit-card" style="display: flex; align-items: center; gap: 20px; text-align: left; padding: 32px;">
                    <div class="benefit-icon" style="background: #eff6ff; color: var(--color-primary); margin: 0;">
                       <svg class="w-6 h-6" fill="none" height="24" stroke="currentColor" viewbox="0 0 24 24" width="24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--color-dark-blue); margin-bottom: 4px;">Llámanos</h4>
                        <p style="color: var(--color-text-muted);">+58 412 123 4567</p>
                    </div>
                </div>

                <div class="benefit-card" style="display: flex; align-items: center; gap: 20px; text-align: left; padding: 32px;">
                    <div class="benefit-icon" style="background: #eff6ff; color: var(--color-primary); margin: 0;">
                       <svg class="w-6 h-6" fill="none" height="24" stroke="currentColor" viewbox="0 0 24 24" width="24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--color-dark-blue); margin-bottom: 4px;">Visítanos</h4>
                        <p style="color: var(--color-text-muted);">Torre Empresarial, Caracas</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="benefit-card" style="padding: 40px; text-align: left;">
                <h3 style="font-size: 1.5rem; color: var(--color-dark-blue); font-weight: 700; margin-bottom: 24px;">Envíanos un mensaje</h3>
                <form method="POST" action="{{ route('pages.contact') }}">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; color: var(--color-dark-blue); margin-bottom: 8px;">Nombre Completo</label>
                        <input type="text" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.3s;" placeholder="Tu nombre">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; color: var(--color-dark-blue); margin-bottom: 8px;">Correo Electrónico</label>
                        <input type="email" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.3s;" placeholder="tucorreo@ejemplo.com">
                    </div>
                    <div style="margin-bottom: 24px;">
                        <label style="display: block; font-weight: 600; color: var(--color-dark-blue); margin-bottom: 8px;">Mensaje</label>
                        <textarea style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; min-height: 120px; outline: none; transition: border-color 0.3s;" placeholder="¿Cómo podemos ayudarte?"></textarea>
                    </div>
                    <button type="submit" class="cta-button" style="width: 100%; justify-content: center;">Enviar Mensaje</button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
