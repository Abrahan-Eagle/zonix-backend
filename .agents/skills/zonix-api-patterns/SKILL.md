---
name: zonix-api-patterns
description: >
  Patrones de API REST de Zonix Gas. Response format, autenticación Sanctum + Google Sign-In, roles (user/sales_admin/dispatcher), middleware CheckRole, validación con FormRequest.
  Trigger: Cuando se trabaje con endpoints API, controladores, middleware de roles, autenticación Sanctum/Google, o formato de respuestas.
license: UNLICENSED
metadata:
  author: Zonix Gas Team
  version: "1.0"
  scope: [app/Http/Controllers/, routes/api.php, app/Http/Middleware/CheckRole.php, app/Http/Requests/]
  auto_invoke: "Trabajar con endpoints o controladores"
  triggers: API, REST, endpoints, controladores, middleware, Sanctum, Google Sign-In, roles, user, sales_admin, dispatcher, validación, FormRequest, response format
  related-skills: laravel-specialist, security, zonix-gas-ticket-system, zonix-verification-dispatch
allowed-tools: [Read, Edit, Write, Glob, Grep, Bash, WebFetch, WebSearch, Task]
---

# ⛽ Patrones de API — Zonix Gas Backend

## Response Format Estándar

```php
// Éxito
return response()->json([
    'success' => true,
    'data' => $data,
    'message' => 'Operación completada exitosamente'
], 200);

// Error
return response()->json([
    'success' => false,
    'message' => 'Descripción del error',
    'errors' => $validator->errors()
], 422);
```

## Autenticación

- **Google Sign-In** → Backend valida token → Crea/actualiza usuario → Genera token Sanctum
- Todos los endpoints protegidos usan `auth:sanctum`
- Rate limiting aplicado

## Roles del Sistema

| Rol | Permisos |
|-----|----------|
| `user` | Crear tickets, ver historial, gestionar perfil |
| `sales_admin` | Verificar datos, escanear QR, aprobar tickets |
| `dispatcher` | Despachar tickets, gestionar cola |

## Middleware

- `auth:sanctum` — Autenticación requerida
- `CheckRole` — Validación de rol (`sales_admin`, `dispatcher`)
- `throttle:60,1` — Rate limiting

## Convenciones de Endpoints

```
POST   /api/auth/google          → Autenticación Google
GET    /api/auth/user             → Usuario actual
POST   /api/auth/logout           → Cerrar sesión
GET    /api/resource              → index (listar)
POST   /api/resource              → store (crear)
GET    /api/resource/{id}         → show (ver uno)
PUT    /api/resource/{id}         → update (actualizar)
DELETE /api/resource/{id}         → destroy (eliminar)
```
