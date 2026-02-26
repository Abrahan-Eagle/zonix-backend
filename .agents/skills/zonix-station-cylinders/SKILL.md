---
name: zonix-station-cylinders
description: >
  Gestión de estaciones de gas y bombonas de Zonix. Estaciones con horarios, capacidad, geolocalización. Bombonas con tipos, pesos, proveedores, aprobación.
  Trigger: Cuando se trabaje con estaciones de distribución, bombonas de gas, proveedores, inventario, horarios, o capacidad por estación.
license: UNLICENSED
metadata:
  author: Zonix Gas Team
  version: "1.0"
  scope: [app/Models/Station.php, app/Models/GasCylinder.php, app/Models/GasSupplier.php, database/migrations/*station*, database/migrations/*cylinder*]
  auto_invoke: "Trabajar con estaciones o bombonas"
  triggers: estación, station, bombona, cylinder, proveedor, supplier, inventario, horarios, capacidad, geolocalización, QR, código bombona
  related-skills: zonix-gas-ticket-system, zonix-verification-dispatch
allowed-tools: [Read, Edit, Write, Glob, Grep, Bash, WebFetch, WebSearch, Task]
---

# 🏪 Estaciones y Bombonas — Zonix Gas Backend

## Estaciones de Distribución

### Configuración
```php
'code' => 'CAR_LLD_001'       // Código único por región
'days_available' => 'Mon,Tue,Wed,Thu,Fri,Sat'
'opening_time' => '09:00:00'
'closing_time' => '17:00:00'
'active' => true
```

### Red de Estaciones
- **12 estaciones** en Carabobo, Valencia, Guacara
- Límite: **200 citas/día** por estación
- Responsables asignados por estación
- Geolocalización con coordenadas GPS

## Bombonas de Gas

### Tipos
| Tipo | Peso | Código |
|------|------|--------|
| `small` | 10kg | CYL001 |
| `wide` | 18kg | CYL002 |
| `industrial` | 45kg | CYL003 |

### Validaciones
- ✅ Aprobación requerida antes de uso
- ✅ Código único de fabricación
- ✅ Fecha de fabricación válida
- ✅ Proveedor asociado verificado

## Endpoints

```
GET    /api/cylinders                    → Listar bombonas
POST   /api/cylinders                    → Crear bombona
GET    /api/cylinders/{id}               → Ver detalle
PUT    /api/cylinders/{id}               → Actualizar
DELETE /api/cylinders/{id}               → Eliminar
GET    /api/cylinders/getGasSuppliers    → Listar proveedores
```
