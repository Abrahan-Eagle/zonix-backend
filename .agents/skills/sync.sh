#!/bin/bash
# Zonix Gas Skills Sync — Validates SKILL.md ↔ AGENTS.md coherence
SKILLS_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_ROOT="$(cd "$SKILLS_DIR/../.." && pwd)"
AGENTS_MD="$PROJECT_ROOT/AGENTS.md"

echo "🔄 Validando coherencia de skills..."

ERRORS=0
CHECKED=0

# Check all zonix-* skills are in AGENTS.md
for skill_dir in "$SKILLS_DIR"/zonix-*/; do
    [ -d "$skill_dir" ] || continue
    skill_name=$(basename "$skill_dir")
    if grep -q "$skill_name" "$AGENTS_MD" 2>/dev/null; then
        echo "✅ $skill_name — presente en AGENTS.md"
    else
        echo "❌ $skill_name — FALTA en AGENTS.md"
        ERRORS=$((ERRORS + 1))
    fi
    CHECKED=$((CHECKED + 1))
done

echo ""
if [ $ERRORS -eq 0 ]; then
    echo "🎉 Todas las skills Zonix Gas están correctamente sincronizadas."
else
    echo "⚠️  $ERRORS errores encontrados de $CHECKED skills verificadas."
fi
