---
name: zonix-payments
description: >
  Propuesta de Sistema de Pagos para Zonix Gas. Integración con Stripe, PayPal y MercadoPago. Gestión de transacciones, facturación, reembolsos y webhooks.
  Trigger: Cuando se inicie la implementación del módulo de pagos, procesamiento de transacciones, o integración con pasarelas de pago.
license: UNLICENSED
metadata:
  author: Zonix Gas Team
  version: "0.1 (Producido por Planificación)"
  scope: [app/Models/Payment.php, app/Services/PaymentService.php, app/Http/Controllers/PaymentController.php]
  auto_invoke: "Mencionar pagos, transacciones, Stripe, o facturación"
  triggers: pagos, payment, Stripe, PayPal, MercadoPago, transacción, factura, reembolso, webhook
  related-skills: zonix-api-patterns, zonix-gas-ticket-system, security
allowed-tools: [Read, Edit, Write, Glob, Grep, Bash, WebFetch, WebSearch, Task]
---

# 💳 Sistema de Pagos (Propuesta) — Zonix Gas Backend

## Arquitectura Propuesta

### Modelo de Datos (Payment)
```php
// Camas sugeridos para migration
$table->foreignId('user_id')->constrained();
$table->foreignId('gas_ticket_id')->constrained();
$table->string('transaction_id')->unique(); // ID de la pasarela
$table->decimal('amount', 10, 2);
$table->string('currency')->default('USD');
$table->string('status'); // pending, completed, failed, refunded
$table->string('payment_method'); // stripe, paypal, mercadopago
$table->json('gateway_response')->nullable();
```

### Endpoints Planificados
```
POST /api/payments/intent          → Crear intención de pago
POST /api/payments/verify          → Verificar pago (client-side)
POST /api/payments/webhook/{gate}  → Webhooks para eventos asíncronos
GET  /api/payments/history         → Historial de pagos del usuario
```

## Integraciones Sugeridas

1. **Stripe**: Uso de `stripe-php` y PaymentIntents.
2. **Webhooks**: Validar firma de webhooks para actualizar estado del ticket (`waiting` → `paid/verifying`).
3. **Seguridad**: Nunca almacenar datos de tarjetas en la base de datos propia.

## Reglas de Negocio de Pagos
- El ticket debe estar en estado `pending` para procesar el pago.
- Un pago exitoso debe marcar el ticket como listo para verificación (`verifying`).
- Soporte para multimoneda (USD/VES).
