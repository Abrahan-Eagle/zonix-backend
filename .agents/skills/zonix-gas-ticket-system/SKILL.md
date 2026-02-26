---
name: zonix-gas-ticket-system
description: >
  Sistema de tickets de gas de Zonix. Ciclo de vida completo del ticket: creación, regla de 21 días, solo domingos para externos, límite 200/estación, cola virtual, QR codes, estados.
  Trigger: Cuando se trabaje con creación de tickets, reglas de negocio de gas, estados de tickets, cola virtual, QR codes, o ciclo de vida del ticket.
license: UNLICENSED
metadata:
  author: Zonix Gas Team
  version: "1.0"
  scope: [app/Http/Controllers/GasTicketController.php, app/Models/GasTicket.php, database/migrations/*gas_ticket*]
  auto_invoke: "Trabajar con tickets de gas"
  triggers: ticket, gas, QR, cola, queue, 21 días, regla, estados, pending, verifying, waiting, dispatched, canceled, expired, bombona, appointment
  related-skills: zonix-api-patterns, zonix-verification-dispatch, zonix-station-cylinders
allowed-tools: [Read, Edit, Write, Glob, Grep, Bash, WebFetch, WebSearch, Task]
---

# 🎫 Sistema de Tickets de Gas — Zonix Backend

## Flujo de Vida del Ticket

```
Creación → pending → verifying → waiting → dispatched
                                        ↘ canceled
                                        ↘ expired (2 días)
```

## Reglas de Negocio Críticas

### 1. Regla de 21 Días
```php
// Usuarios internos: mínimo 21 días entre compras
$daysSince = Carbon::now()->diffInDays($lastTicket->appointment_date);
if ($daysSince < 21) {
    return response()->json(['message' => 'Debe esperar ' . (21 - $daysSince) . ' días']);
}
```

### 2. Solo Domingos (Externos)
```php
if ($isExternal && !Carbon::now()->isSunday()) {
    return response()->json(['message' => 'Citas externas solo los domingos']);
}
```

### 3. Límite Diario (200 tickets/estación)
```php
$dailyCount = GasTicket::whereDate('appointment_date', $date)
    ->where('station_id', $stationId)->count();
if ($dailyCount >= 200) {
    return response()->json(['message' => 'Límite diario alcanzado']);
}
```

### 4. Asignación de Cola
- Posición automática: `$queuePosition = $dailyCount + 1`
- QR code basado en código de bombona

## Estados del Ticket

| Estado | Descripción | Quién cambia |
|--------|-------------|--------------|
| `pending` | Recién creado | Sistema |
| `verifying` | En verificación | Sales Admin |
| `waiting` | En cola de espera | Sales Admin |
| `dispatched` | Entregado | Dispatcher |
| `canceled` | Cancelado | Usuario/Admin |
| `expired` | Vencido (2 días) | Sistema |

## Endpoints

```
GET    /api/tickets/{userId}                    → Listar tickets del usuario
POST   /api/tickets                             → Crear ticket
GET    /api/tickets/{id}                        → Ver detalle
PUT    /api/tickets/{id}                        → Actualizar
DELETE /api/tickets/{id}                        → Eliminar
GET    /api/tickets/getGasCylinders/{id}        → Bombonas por estación
GET    /api/tickets/stations/getGasStations     → Listar estaciones
```
