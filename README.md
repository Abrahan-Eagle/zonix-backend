# 🚀 ZONIX Backend - API REST Laravel

## 🎯 Descripción

**ZONIX Backend** es la API REST desarrollada con Laravel 10 que gestiona todo el sistema de distribución de gas doméstico. Proporciona endpoints seguros para autenticación, gestión de perfiles, tickets de gas, estaciones y verificación de datos.

## 🏗️ Arquitectura Técnica

- **Framework**: Laravel 10
- **PHP**: 8.1+
- **Base de Datos**: MySQL
- **Autenticación**: Laravel Sanctum (JWT tokens)
- **CORS**: Configurado para permitir solicitudes desde Flutter
- **API**: RESTful JSON

## 📁 Estructura del Proyecto

```
zonix-backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Authenticator/
│   │   │   │   └── AuthController.php
│   │   │   ├── GasTicket/
│   │   │   │   ├── Admin/
│   │   │   │   │   ├── DataVerificationController.php
│   │   │   │   │   └── SalesAdminController.php
│   │   │   │   ├── AdminController.php
│   │   │   │   ├── GasCylinderController.php
│   │   │   │   └── GasTicketController.php
│   │   │   └── Profiles/
│   │   │       ├── AddressController.php
│   │   │       ├── DocumentController.php
│   │   │       ├── EmailController.php
│   │   │       ├── PhoneController.php
│   │   │       └── ProfileController.php
│   │   └── Middleware/
│   │       └── CheckRole.php (Role-based access)
│   └── Models/
│       ├── User.php
│       ├── Profile.php
│       ├── GasTicket.php
│       ├── GasCylinder.php
│       ├── Station.php
│       └── ... (otros modelos)
├── routes/
│   └── api.php (Definición de rutas)
├── database/
│   ├── migrations/ (Estructura de BD)
│   └── seeders/ (Datos de prueba)
└── tests/ (Pruebas unitarias y de integración)
```

## 🔑 Autenticación

### Google Sign-In Flow

```http
POST /api/auth/google
Content-Type: application/json

{
  "id_token": "google_id_token",
  "email": "user@example.com",
  "name": "User Name"
}
```

**Respuesta exitosa:**
```json
{
  "success": true,
  "token": "sanctum_token_here",
  "user": {
    "id": 1,
    "email": "user@example.com",
    "role": "user",
    "completed_onboarding": false
  }
}
```

### Obtener Usuario Autenticado

```http
GET /api/auth/user
Authorization: Bearer {token}
```

### Cerrar Sesión

```http
POST /api/auth/logout
Authorization: Bearer {token}
```

## 📚 Endpoints Principales

### 🔐 Autenticación

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| POST | `/api/auth/google` | Autenticación con Google | ❌ |
| GET | `/api/auth/user` | Obtener usuario actual | ✅ |
| POST | `/api/auth/logout` | Cerrar sesión | ✅ |
| PUT | `/api/onboarding/{id}` | Completar onboarding | ✅ |

### 👤 Perfiles

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/profiles` | Listar todos los perfiles | ✅ |
| POST | `/api/profiles` | Crear nuevo perfil | ✅ |
| GET | `/api/profiles/{id}` | Obtener perfil específico | ✅ |
| POST | `/api/profiles/{id}` | Actualizar perfil | ✅ |
| DELETE | `/api/profiles/{id}` | Eliminar perfil | ✅ |

### 📄 Documentos

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/documents` | Listar documentos | ✅ |
| POST | `/api/documents` | Crear documento | ✅ |
| GET | `/api/documents/{id}` | Obtener documento | ✅ |
| PUT | `/api/documents/{id}` | Actualizar documento | ✅ |
| DELETE | `/api/documents/{id}` | Eliminar documento | ✅ |

### 🎫 Tickets de Gas

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/tickets` | Listar tickets | ✅ |
| POST | `/api/tickets` | Crear ticket | ✅ |
| GET | `/api/tickets/{id}` | Obtener ticket | ✅ |
| PUT | `/api/tickets/{id}` | Actualizar ticket | ✅ |
| DELETE | `/api/tickets/{id}` | Eliminar ticket | ✅ |
| GET | `/api/tickets/getGasCylinders/{id}` | Obtener bombonas por estación | ✅ |
| GET | `/api/tickets/stations/getGasStations` | Obtener estaciones | ✅ |

### 🏪 Sales Admin (Verificación)

| Método | Endpoint | Descripción | Role |
|--------|----------|-------------|------|
| POST | `/api/sales-admin/tickets/{id}/verify` | Verificar ticket | `sales_admin` |
| POST | `/api/sales-admin/tickets/{id}/waiting` | Marcar como esperando | `sales_admin` |
| POST | `/api/sales-admin/tickets/{id}/cancel` | Cancelar ticket | `sales_admin` |

### 🚚 Dispatch (Despacho)

| Método | Endpoint | Descripción | Role |
|--------|----------|-------------|------|
| POST | `/api/dispatch/tickets/{qrCodeId}/qr-code` | Escanear QR para despacho | `dispatcher` |
| POST | `/api/dispatch/tickets/{qrCodeId}/qr-code-gas-cylinder-admin-sale` | Escanear QR bombona | `dispatcher` |
| POST | `/api/dispatch/tickets/{id}/dispatch` | Despachar ticket | `dispatcher` |

### 🛢️ Bombonas de Gas

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/cylinders` | Listar bombonas | ✅ |
| POST | `/api/cylinders` | Crear bombona | ✅ |
| GET | `/api/cylinders/{id}` | Obtener bombona | ✅ |
| PUT | `/api/cylinders/{id}` | Actualizar bombona | ✅ |
| DELETE | `/api/cylinders/{id}` | Eliminar bombona | ✅ |
| GET | `/api/cylinders/getGasSuppliers` | Obtener proveedores | ✅ |

### 📱 Teléfonos

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/phones` | Listar teléfonos | ✅ |
| POST | `/api/phones` | Crear teléfono | ✅ |
| GET | `/api/phones/{id}` | Obtener teléfono | ✅ |
| PUT | `/api/phones/{id}` | Actualizar teléfono | ✅ |
| DELETE | `/api/phones/{id}` | Eliminar teléfono | ✅ |

### 📧 Emails

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/emails` | Listar emails | ✅ |
| POST | `/api/emails` | Crear email | ✅ |
| GET | `/api/emails/{id}` | Obtener email | ✅ |
| PUT | `/api/emails/{id}` | Actualizar email | ✅ |
| DELETE | `/api/emails/{id}` | Eliminar email | ✅ |

### 🏠 Direcciones

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/addresses` | Listar direcciones | ✅ |
| POST | `/api/addresses` | Crear dirección | ✅ |
| GET | `/api/addresses/{id}` | Obtener dirección | ✅ |
| PUT | `/api/addresses/{id}` | Actualizar dirección | ✅ |
| DELETE | `/api/addresses/{id}` | Eliminar dirección | ✅ |
| POST | `/api/addresses/getCountries` | Obtener países | ✅ |
| POST | `/api/addresses/get-states-by-country` | Obtener estados | ✅ |
| POST | `/api/addresses/get-cities-by-state` | Obtener ciudades | ✅ |

### ✅ Verificación de Datos

| Método | Endpoint | Descripción | Auth |
|--------|----------|-------------|------|
| GET | `/api/data-verification/{profile_id}` | Obtener verificaciones | ✅ |
| POST | `/api/data-verification/{profile_id}/update-status-check-scanner/profiles` | Actualizar verificación perfil | ✅ |
| POST | `/api/data-verification/{profile_id}/update-status-check-scanner/addresses` | Actualizar verificación dirección | ✅ |
| POST | `/api/data-verification/{profile_id}/update-status-check-scanner/gas-cylinders` | Actualizar verificación bombona | ✅ |
| POST | `/api/data-verification/{profile_id}/update-status-check-scanner/phones` | Actualizar verificación teléfono | ✅ |
| POST | `/api/data-verification/{profile_id}/update-status-check-scanner/documents` | Actualizar verificación documento | ✅ |
| POST | `/api/data-verification/{profile_id}/update-status-check-scanner/emails` | Actualizar verificación email | ✅ |

## 🏭 Reglas de Negocio

### 🎫 Creación de Tickets

#### Regla de 21 Días (Usuarios Internos)
```php
// El sistema valida que hayan pasado 21 días desde el último ticket dispatched
$lastTicket = GasTicket::where('profile_id', $profileId)
    ->where('status', 'dispatched')
    ->orderBy('appointment_date', 'desc')
    ->first();

if ($lastTicket && Carbon::now()->diffInDays($lastTicket->appointment_date) < 21) {
    return response()->json([
        'success' => false,
        'message' => 'Debe esperar 21 días entre compras'
    ], 400);
}
```

#### Solo Domingos (Usuarios Externos)
```php
// Usuarios externos solo pueden crear tickets los domingos
if ($isExternal && !Carbon::now()->isSunday()) {
    return response()->json([
        'success' => false,
        'message' => 'Las citas externas solo están disponibles los domingos'
    ], 400);
}
```

#### Límite Diario por Estación (200 tickets)
```php
// Máximo 200 tickets por estación por día
$dailyCount = GasTicket::whereDate('appointment_date', $appointmentDate)
    ->where('station_id', $stationId)
    ->count();

if ($dailyCount >= 200) {
    return response()->json([
        'success' => false,
        'message' => 'Límite diario alcanzado para esta estación'
    ], 400);
}
```

#### Validación de Días Disponibles
```php
// Verificar que la estación esté disponible el día solicitado
$currentDay = Carbon::parse($appointmentDate)->format('l');
$daysAvailable = explode(',', $station->days_available);

if (!in_array($currentDay, $daysAvailable)) {
    return response()->json([
        'success' => false,
        'message' => 'La estación no está disponible este día'
    ], 400);
}
```

### 📊 Estados de Tickets

| Estado | Descripción | Transiciones Permitidas |
|--------|-------------|-------------------------|
| `pending` | Pendiente de verificación | → `verifying` (Sales Admin) |
| `verifying` | En proceso de verificación | → `waiting` (Sales Admin) |
| `waiting` | Esperando en cola | → `dispatched` (Dispatcher) |
| `dispatched` | Entregado/Comprado | - |
| `canceled` | Cancelado | - |
| `expired` | Expirado (2 días después de cita) | - |

### 🔐 Control de Acceso por Roles

#### Roles del Sistema
- **`user`**: Usuario regular - Crear tickets, ver historial
- **`sales_admin`**: Administrador de ventas - Verificar datos, escanear QR, aprobar tickets
- **`dispatcher`**: Despachador - Gestionar colas, despachar tickets

#### Middleware de Roles
```php
Route::post('/sales-admin/tickets/{id}/verify', [SalesAdminController::class, 'verifyTicket'])
    ->middleware('role:sales_admin');

Route::post('/dispatch/tickets/{qrCodeId}/qr-code', [SalesAdminController::class, 'qrCode'])
    ->middleware('role:dispatcher');
```

## 🗄️ Modelos y Relaciones

### Estructura de Base de Datos

```
users (1:1) → profiles
profiles (1:N) → phones, emails, documents, addresses
gas_tickets → belongs_to: profiles, gas_cylinders, stations
gas_cylinders → belongs_to: gas_suppliers
stations → tiene: gas_tickets
```

### Modelos Principales

- **User**: Usuario del sistema (Google Auth)
- **Profile**: Perfil completo del usuario
- **GasTicket**: Ticket de compra/entrega de gas
- **GasCylinder**: Bombona de gas con características
- **Station**: Estación de distribución
- **Phone**: Teléfonos asociados al perfil
- **Email**: Emails asociados al perfil
- **Document**: Documentos asociados al perfil
- **Address**: Direcciones asociadas al perfil

## 🚀 Instalación y Configuración

### Requisitos Previos

- PHP 8.1 o superior
- Composer
- MySQL 5.7+ o MariaDB
- Extensiones PHP: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

### Pasos de Instalación

1. **Clonar el repositorio**
```bash
git clone <repository-url>
cd zonix-backend
```

2. **Instalar dependencias**
```bash
composer install
```

3. **Configurar archivo de entorno**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurar base de datos en `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zionix_BD
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

5. **Ejecutar migraciones**
```bash
php artisan migrate
```

6. **Poblar base de datos (opcional)**
```bash
php artisan db:seed
```

7. **Iniciar servidor de desarrollo**
```bash
php artisan serve --host=192.168.27.4 --port=8000
```

## 🧪 Testing

### Ejecutar pruebas
```bash
php artisan test
```

### Pruebas disponibles
- **AuthenticationTest**: Flujos de autenticación
- **CreateGasTicketTest**: Creación de tickets
- **GasTicketBusinessRulesTest**: Reglas de negocio
- **ProfileControllerTest**: CRUD de perfiles
- **RoleBasedAccessTest**: Control de acceso por roles

## 📦 Estructura de Respuestas API

### Respuesta Exitosa
```json
{
  "success": true,
  "data": { ... },
  "message": "Operación completada exitosamente"
}
```

### Respuesta de Error
```json
{
  "success": false,
  "message": "Descripción del error",
  "errors": {
    "campo": ["Mensaje de validación"]
  }
}
```

## 🔧 Comandos Útiles

### Desarrollo
```bash
# Iniciar servidor local
php artisan serve --host=192.168.27.4 --port=8000

# Limpiar caché
php artisan config:cache
php artisan cache:clear
php artisan route:clear

# Ver rutas
php artisan route:list
```

### Base de Datos
```bash
# Refrescar migraciones y seeders
php artisan migrate:refresh --seed

# Crear migración
php artisan make:migration create_table_name

# Crear seeder
php artisan make:seeder TableNameSeeder
```

## 🌍 Configuración de Entorno

### Variables de Entorno Importantes

```env
APP_NAME=ZONIX
APP_ENV=production
APP_DEBUG=false
APP_URL=https://zonix.aiblockweb.com

DB_CONNECTION=mysql
DB_DATABASE=zionix_BD

SANCTUM_STATEFUL_DOMAINS=zonix.aiblockweb.com
SESSION_DRIVER=cookie
```

### Configuración CORS

El archivo `config/cors.php` está configurado para permitir solicitudes desde:
- `http://192.168.27.4:8000` (Desarrollo local)
- `https://zonix.aiblockweb.com` (Producción)

## 🔒 Seguridad

- ✅ **Autenticación**: Laravel Sanctum (JWT tokens)
- ✅ **Validación**: Form Requests para validación de datos
- ✅ **CORS**: Configurado para dominios específicos
- ✅ **Middleware**: Role-based access control
- ✅ **Sanitización**: Entradas de usuario validadas
- ✅ **HTTPS**: Requerido en producción

## 📊 Base de Datos

### Base de Datos: `zionix_BD`

### Tablas Principales
- `users` - Usuarios del sistema
- `profiles` - Perfiles de usuario
- `gas_tickets` - Tickets de gas
- `gas_cylinders` - Bombonas de gas
- `stations` - Estaciones de distribución
- `phones`, `emails`, `documents`, `addresses` - Datos del perfil
- `data_verifications` - Verificaciones de datos

## 🚢 Despliegue

### CI/CD Automático

El backend tiene CI/CD configurado en GitHub Actions (`.github/workflows/main.yml`):
- **Trigger**: Push a `main` branch
- **Acción**: Despliegue automático a producción

### Proceso de Despliegue

1. Push a `main` branch
2. GitHub Actions ejecuta tests
3. Despliegue automático a producción
4. Verificación de salud de la API

### Consideraciones de Producción

- ✅ Usar `APP_DEBUG=false`
- ✅ Configurar `APP_ENV=production`
- ✅ Usar HTTPS
- ✅ Configurar backups de base de datos
- ✅ Monitorear logs (`storage/logs/`)
- ✅ Optimizar caché: `php artisan config:cache`

## 🔗 Proyecto Completo

Este es el **backend** del proyecto ZONIX. El proyecto completo incluye:

- **Backend (este proyecto)**: API REST Laravel
- **Frontend**: Aplicación Flutter móvil en [zonix](../zonix)

### Documentación Relacionada

- **Frontend App**: Ver [README.md](../zonix/README.md) para documentación del frontend Flutter
- **Modelo de Negocio**: Consulta [README_ZONIX_COMPLETE.md](../zonix/README_ZONIX_COMPLETE.md) para detalles del modelo de negocio
- **Reglas del Proyecto**: Ver [.cursorrules](.cursorrules) para estándares de código

## 📝 Documentación Adicional

Para más información sobre:
- **Frontend Flutter**: Ver [zonix/README.md](../zonix/README.md)
- **Modelo de negocio**: Consultar [zonix/README_ZONIX_COMPLETE.md](../zonix/README_ZONIX_COMPLETE.md)
- **Flujo completo**: Ver documentación en `zonix/README.md`
- **Reglas de negocio**: Ver `.cursorrules` del proyecto

## 🐛 Debugging

### Logs
```bash
# Ver logs en tiempo real
tail -f storage/logs/laravel.log
```

### Tinker (Consola Laravel)
```bash
php artisan tinker

# Ejemplo: Consultar tickets
>>> GasTicket::with('profile')->first()
```

## 📞 Soporte

Para problemas o preguntas sobre el backend:
1. Revisar logs en `storage/logs/`
2. Verificar configuración en `.env`
3. Ejecutar tests: `php artisan test`
4. Consultar documentación de Laravel: https://laravel.com/docs

## 📊 Análisis de Estado y Calidad del Código

### Estado General del Proyecto
**Score de Mantenibilidad: 7/10** - Production Ready con mejoras recomendadas

### Fortalezas Identificadas
✅ **Arquitectura clara**: MVC de Laravel bien estructurado  
✅ **Reglas de negocio**: Implementadas y documentadas correctamente  
✅ **Autenticación robusta**: Laravel Sanctum con roles  
✅ **Testing parcial**: 11 archivos de tests (6 Feature, 3 Unit)  
✅ **66 rutas API**: Endpoints bien organizados por recurso  
✅ **16 modelos**: Relaciones Eloquent bien definidas

### Áreas de Mejora Críticas

#### ❌ Seguridad (Prioridad Crítica)
1. **Rutas de debug expuestas**: `routes/api.php:19-27`
   ```php
   Route::get('/env-test', function () {
       dd(env('APP_NAME'), env('DB_DATABASE'), env('APP_DEBUG'));
   });
   Route::get('/migrate-refresh', function () {
       Artisan::call('migrate:refresh', ['--seed' => true]);
   });
   ```
   - **Impacto**: Crítico - Expone configuración y permite resetear BD
   - **Esfuerzo**: 5 minutos (eliminar o proteger con middleware)
   - **Prioridad**: CRÍTICA - Remediar inmediatamente

#### ⚠️ Testing
- **Cobertura limitada**: 11 archivos de tests
  - **Áreas sin tests**: Algunos controladores y endpoints críticos
  - **Impacto**: Calidad - Riesgo de regresiones
  - **Esfuerzo**: 1 semana (tests adicionales)
  - **Prioridad**: Alta

#### ⚠️ Arquitectura
- **Lógica en controladores**: Algunos controladores con lógica de negocio compleja
  - **Impacto**: Testabilidad - Difícil de testear en aislamiento
  - **Esfuerzo**: 1 semana (extraer a servicios)
  - **Prioridad**: Media

#### ⚠️ Performance
- **Falta caching**: Sin estrategias de caching implementadas
  - **Impacto**: Performance - Queries repetidas
  - **Esfuerzo**: 2-4 horas (implementar Redis/caching básico)
  - **Prioridad**: Media

- **Posibles N+1 queries**: No verificadas exhaustivamente
  - **Impacto**: Performance - Consultas lentas con relaciones
  - **Esfuerzo**: 2-3 horas (revisar y agregar eager loading)
  - **Prioridad**: Media

### Recomendaciones Prioritizadas

**CRÍTICO (Inmediato - 1 día):**
1. ❌ **ELIMINAR rutas de debug** (`/env-test`, `/migrate-refresh`) - 5 minutos
2. ❌ **Verificar headers de seguridad** (CORS, CSP, HSTS) - 1 hora

**Alta Prioridad (1 semana):**
3. ⚠️ **Implementar tests adicionales** para endpoints críticos - 1 semana
4. ⚠️ **Agregar rate limiting** en autenticación - 2-4 horas

**Media Prioridad (2-4 semanas):**
5. ⏳ **Extraer servicios de negocio** de controladores - 1 semana
6. ⏳ **Implementar caching** (Redis) - 2-4 horas
7. ⏳ **Revisar y optimizar queries** (N+1, índices) - 2-3 horas

### Métricas del Proyecto
- **Versión**: 1.0.0
- **Controladores**: 12 clases
- **Modelos**: 16 modelos Eloquent
- **Rutas API**: ~66 endpoints
- **Tests**: 11 archivos (6 Feature, 3 Unit, 2 base)
- **Cobertura**: No medida (objetivo: >70%)

### Vulnerabilidades de Seguridad Identificadas

**Críticas:**
- ⚠️ Rutas de debug expuestas (`/env-test`, `/migrate-refresh`)
- ⚠️ Headers de seguridad no verificados

**Importantes:**
- ⚠️ Falta rate limiting en autenticación
- ⚠️ Logging de seguridad limitado

Para más detalles del análisis exhaustivo, ver [ANALISIS_EXHAUSTIVO_ZONIX.md](../ANALISIS_EXHAUSTIVO_ZONIX.md)

## 🎯 Roadmap

### Próximas Funcionalidades
- [ ] Notificaciones push (Firebase Cloud Messaging)
- [ ] Sistema de pagos integrado
- [ ] Dashboard administrativo
- [ ] Reportes y estadísticas
- [ ] Exportación de datos

### Mejoras Técnicas Prioritarias
- [ ] Eliminar rutas de debug (CRÍTICO - inmediato)
- [ ] Implementar tests adicionales (Alta - 1 semana)
- [ ] Extraer servicios de negocio (Media - 1 semana)
- [ ] Implementar caching (Media - 2-4 horas)
- [ ] Optimizar queries y agregar índices (Media - 2-3 horas)

---

**Versión**: 1.0.0 | **Última actualización**: Diciembre 2024 | **Score de Mantenibilidad**: 7/10
