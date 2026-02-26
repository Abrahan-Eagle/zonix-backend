# ⛽ Zonix Gas — Backend (Laravel 10)

## Project Overview

**ZONIX** es un sistema integral de gestión de distribución de gas doméstico.

- **Stack**: Laravel 10 + PHP 8.1+ + MySQL + Sanctum
- **Auth**: Google Sign-In → Sanctum JWT tokens
- **API**: 62+ endpoints REST organizados por recurso
- **Roles**: `user`, `sales_admin`, `dispatcher`
- **Prod URL**: `https://zonix.aiblockweb.com`

## Setup Commands

```bash
# Instalar dependencias
composer install

# Servidor local
php artisan serve --host=192.168.27.4 --port=8000

# Migraciones
php artisan migrate:fresh --seed

# Cache
php artisan config:cache && php artisan route:cache

# Tests
php artisan test
```

## Available Skills

### 🔧 Generic Skills

| Skill                           | Path                                                                | Auto-invoke           |
| ------------------------------- | ------------------------------------------------------------------- | --------------------- |
| laravel-specialist              | [SKILL.md](.agents/skills/laravel-specialist/SKILL.md)              | Trabajar con Laravel  |
| api-design-principles           | [SKILL.md](.agents/skills/api-design-principles/SKILL.md)           | Diseñar APIs          |
| sql-optimization-patterns       | [SKILL.md](.agents/skills/sql-optimization-patterns/SKILL.md)       | Optimizar queries     |
| mysql-best-practices            | [SKILL.md](.agents/skills/mysql-best-practices/SKILL.md)            | Diseño de BD          |
| security                        | [SKILL.md](.agents/skills/security/SKILL.md)                        | Implementar seguridad |
| security-requirement-extraction | [SKILL.md](.agents/skills/security-requirement-extraction/SKILL.md) | Auditar seguridad     |
| error-handling-patterns         | [SKILL.md](.agents/skills/error-handling-patterns/SKILL.md)         | Manejar errores       |
| github-actions-templates        | [SKILL.md](.agents/skills/github-actions-templates/SKILL.md)        | CI/CD workflows       |
| architecture-patterns           | [SKILL.md](.agents/skills/architecture-patterns/SKILL.md)           | Arquitectura          |
| clean-code-principles           | [SKILL.md](.agents/skills/clean-code-principles/SKILL.md)           | Código limpio         |
| e2e-testing-patterns            | [SKILL.md](.agents/skills/e2e-testing-patterns/SKILL.md)            | Testing E2E           |
| code-review-playbook            | [SKILL.md](.agents/skills/code-review-playbook/SKILL.md)            | Code review           |
| code-review-excellence          | [SKILL.md](.agents/skills/code-review-excellence/SKILL.md)          | PR reviews            |
| systematic-debugging            | [SKILL.md](.agents/skills/systematic-debugging/SKILL.md)            | Debugging             |
| test-driven-development         | [SKILL.md](.agents/skills/test-driven-development/SKILL.md)         | TDD                   |
| git-commit                      | [SKILL.md](.agents/skills/git-commit/SKILL.md)                      | Git commits           |
| skill-creator                   | [SKILL.md](.agents/skills/skill-creator/SKILL.md)                   | Crear skills          |

### ⛽ Zonix Gas Skills

| Skill                       | Path                                                            | Auto-invoke                            |
| --------------------------- | --------------------------------------------------------------- | -------------------------------------- |
| zonix-api-patterns          | [SKILL.md](.agents/skills/zonix-api-patterns/SKILL.md)          | Trabajar con endpoints o controladores |
| zonix-gas-ticket-system     | [SKILL.md](.agents/skills/zonix-gas-ticket-system/SKILL.md)     | Trabajar con tickets de gas            |
| zonix-verification-dispatch | [SKILL.md](.agents/skills/zonix-verification-dispatch/SKILL.md) | Trabajar con verificación o despacho   |
| zonix-station-cylinders     | [SKILL.md](.agents/skills/zonix-station-cylinders/SKILL.md)     | Trabajar con estaciones o bombonas     |
| zonix-payments              | [SKILL.md](.agents/skills/zonix-payments/SKILL.md)              | Implementar pagos o transacciones      |

## Auto-Invoke Mappings

> **IMPORTANTE**: Invocar automáticamente las skills según contexto:

- **Endpoint / Controlador** → `zonix-api-patterns` + `laravel-specialist`
- **Ticket de gas / QR / Cola** → `zonix-gas-ticket-system`
- **Verificación / Despacho / Sales Admin / Dispatcher** → `zonix-verification-dispatch`
- **Estación / Bombona / Proveedor** → `zonix-station-cylinders`
- **Query SQL / Performance** → `sql-optimization-patterns` + `mysql-best-practices`
- **Seguridad / Auth** → `security` + `zonix-api-patterns`
- **CI/CD / Deploy** → `github-actions-templates`
- **Testing** → `test-driven-development` + `e2e-testing-patterns`
- **Git commit** → `git-commit`
- **Code review** → `code-review-playbook`

## Architecture

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php          # Google Sign-In + Sanctum
│   │   ├── GasTicketController.php     # CRUD tickets + reglas de negocio
│   │   ├── DataVerificationController  # Verificación Sales Admin
│   │   ├── DispatchController.php      # Despacho Dispatcher
│   │   └── Profiles/                   # Profile, Phone, Email, Address, Document
│   ├── Middleware/
│   │   └── CheckRole.php               # Role-based access
│   └── Requests/                       # Form Requests
├── Models/
│   ├── User.php, Profile.php
│   ├── GasTicket.php, Station.php
│   ├── GasCylinder.php, GasSupplier.php
│   └── DataVerification.php
database/
├── migrations/
└── seeders/
routes/
└── api.php                             # 62+ endpoints
```

## Code Style

- **PHP/Laravel**: snake_case para DB, camelCase para variables
- **Comentarios**: En español cuando sea posible
- **Validación**: Form Requests para validación compleja
- **Response**: Siempre `{ success: bool, data/message, errors? }`
- **Roles**: Middleware `CheckRole` para acceso basado en roles

## API Response Format

```php
// Success
return response()->json(['success' => true, 'data' => $data, 'message' => '...'], 200);

// Error
return response()->json(['success' => false, 'message' => '...', 'errors' => []], 422);
```

## Git Workflow

- **Rama principal**: `main`
- **Desarrollo**: `dev`
- **Commits**: Conventional commits (`feat:`, `fix:`, `docs:`)
- **CI/CD**: GitHub Actions → Deploy automático a producción
- **Deploy URL**: `https://zonix.aiblockweb.com`

## Environments

| Entorno    | URL                            | BD               |
| ---------- | ------------------------------ | ---------------- |
| Local      | `http://192.168.27.4:8000`     | `zionix_BD`      |
| Production | `https://zonix.aiblockweb.com` | MySQL producción |

## Maintenance

Ver [MAINTENANCE_SKILLS.md](MAINTENANCE_SKILLS.md) para guía de mantenimiento de skills.
