#!/bin/bash
# Zonix Gas Skills Setup — Cross-agent compatibility
# Creates symlinks for skills in agent-specific directories.

SKILLS_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_ROOT="$(cd "$SKILLS_DIR/../.." && pwd)"

echo "⛽ Zonix Gas — Backend Skills Setup"
echo "📁 Skills dir: $SKILLS_DIR"
echo "📁 Project root: $PROJECT_ROOT"

# List of agents
AGENTS=(".claude" ".gemini" ".codex" ".copilot" ".cursor")

for agent in "${AGENTS[@]}"; do
    agent_dir="$PROJECT_ROOT/$agent"
    mkdir -p "$agent_dir"
    # Create symlink if not exists
    if [ ! -L "$agent_dir/skills" ] && [ ! -d "$agent_dir/skills" ]; then
        ln -sf "$SKILLS_DIR" "$agent_dir/skills"
        echo "✅ Symlink: $agent/skills → .agents/skills"
    else
        echo "ℹ️  $agent/skills already exists"
    fi
done

echo ""
echo "🎉 Setup completado"
