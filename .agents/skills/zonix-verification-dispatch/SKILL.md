---
name: zonix-verification-dispatch
description: >
  Sistema de verificación (Sales Admin) y despacho (Dispatcher) de Zonix Gas. Escaneo QR, verificación de datos, cambio de estados, despacho de bombonas.
  Trigger: Cuando se trabaje con verificación de datos, escaneo QR de tickets, despacho de bombonas, roles de Sales Admin o Dispatcher.
license: UNLICENSED
metadata:
  author: Zonix Gas Team
  version: "1.0"
  scope: [app/Http/Controllers/DataVerificationController.php, app/Http/Controllers/DispatchController.php, app/Models/DataVerification.php]
  auto_invoke: "Trabajar con verificación o despacho"
  triggers: verificación, despacho, dispatch, Sales Admin, QR scanner, data verification, check scanner, ticket states, bombona física
  related-skills: zonix-gas-ticket-system, zonix-api-patterns, zonix-station-cylinders
allowed-tools: [Read, Edit, Write, Glob, Grep, Bash, WebFetch, WebSearch, Task]
---

# 🔍 Verificación y Despacho — Zonix Gas Backend

## Flujo de Verificación (Sales Admin)

1. Escanear QR de perfil → `POST /api/data-verification/{profile_id}/update-status-check-scanner/profiles`
2. Backend retorna módulo a verificar (profile, addresses, documents, phones, emails, gasCylinders)
3. Admin verifica datos → Aprueba/rechaza
4. Ticket pasa: `pending` → `verifying` → `waiting`

## Flujo de Despacho (Dispatcher)

1. Escanear QR de ticket → `POST /api/dispatch/tickets/{qrCodeId}/qr-code`
2. Validar estado `waiting`
3. Escanear bombona física → Comparar código
4. Despachar → `POST /api/dispatch/tickets/{id}/dispatch`
5. Ticket pasa: `waiting` → `dispatched`

## Endpoints de Verificación

```
GET    /api/data-verification/{profile_id}                                          → Obtener verificaciones
POST   /api/data-verification/{profile_id}/update-status-check-scanner/profiles     → Verificar perfil
POST   /api/data-verification/{profile_id}/update-status-check-scanner/addresses    → Verificar dirección
POST   /api/data-verification/{profile_id}/update-status-check-scanner/documents    → Verificar documentos
```

## Endpoints de Despacho

```
POST   /api/dispatch/tickets/{qrCodeId}/qr-code  → Buscar ticket por QR
POST   /api/dispatch/tickets/{id}/dispatch        → Despachar ticket
```
