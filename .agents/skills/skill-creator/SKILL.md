---
name: skill-creator
description: >
  Create new AI agent skills following Prowler standards. YAML frontmatter, metadata, triggers, related-skills.
  Trigger: When creating a new skill or updating skill metadata.
license: MIT
metadata:
  author: CorralX/Zonix Team
  version: "1.0"
  triggers: skill, create skill, new skill, SKILL.md, metadata, YAML frontmatter
allowed-tools: [Read, Edit, Write, Glob, Grep, Bash]
---

# Skill Creator

## Template for New Skills
```yaml
---
name: skill-name
description: >
  Description of the skill.
  Trigger: When to activate this skill.
license: MIT/UNLICENSED
metadata:
  author: Team Name
  version: "1.0"
  scope: [relevant/paths/]
  auto_invoke: "Condition"
  triggers: keyword1, keyword2, keyword3
  related-skills: skill-a, skill-b
allowed-tools: [Read, Edit, Write, Glob, Grep, Bash]
---
```

## After creating a skill:
1. Add it to AGENTS.md in the skills table
2. Run `sync.sh` to validate
