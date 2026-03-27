# MandaBrain v2 (bootstrap)

Esta pasta inicia a migração incremental do projeto legado para uma arquitetura moderna.

## Objetivo desta etapa

- Criar uma base **isolada** para o novo frontend em Next.js.
- Manter o sistema legado em PHP sem alterações funcionais.
- Garantir testes automatizados desde o início.

## Estrutura atual

```txt
mandabrain-v2/
  apps/
    web/     # Next.js + TypeScript + Vitest
```

## Como executar

```bash
cd mandabrain-v2/apps/web
npm install
npm run test
npm run dev
```

## Check de saúde

Com a aplicação em execução:

- `GET http://localhost:3000/api/health`

Resposta esperada (exemplo):

```json
{
  "service": "mandabrain-web",
  "status": "ok",
  "timestamp": "2026-03-27T00:00:00.000Z",
  "version": "v2-bootstrap"
}
```

## Próximos passos

1. Iniciar módulo de autenticação no backend v2.
2. Integrar frontend de login ao backend v2.
3. Introduzir banco PostgreSQL com migrações versionadas.
