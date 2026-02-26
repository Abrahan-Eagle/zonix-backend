# 🛠️ Mantenimiento de Skills — Zonix Gas Backend

## Estándar Prowler

Todas las skills siguen el estándar de [Prowler / Gentleman Programming](https://github.com/prowler-cloud/prowler):
- YAML frontmatter con `name`, `description`, `license`, `metadata`
- Metadata incluye: `author`, `version`, `scope`, `triggers`, `related-skills`
- Archivos en `.agents/skills/{nombre}/SKILL.md`

## Agregar Nueva Skill

1. Crear directorio: `.agents/skills/{nombre}/`
2. Crear `SKILL.md` siguiendo la skill `skill-creator`
3. Agregar a la tabla en `AGENTS.md`
4. Ejecutar `bash .agents/skills/sync.sh`

## Validación

```bash
# Validar coherencia
bash .agents/skills/sync.sh

# Verificar links de AGENTS.md
grep -oP '\.agents/skills/[^/]+/SKILL\.md' AGENTS.md | while read p; do
  [ -f "$p" ] && echo "✅ $p" || echo "❌ MISSING: $p"
done
```

## Estructura

```
.agents/skills/
├── setup.sh                    # Symlinks cross-agent
├── sync.sh                     # Validación de coherencia
├── laravel-specialist/         # Generic skills (17)
├── api-design-principles/
├── ...
├── zonix-api-patterns/         # Custom skills (4)
├── zonix-gas-ticket-system/
├── zonix-verification-dispatch/
└── zonix-station-cylinders/
```
