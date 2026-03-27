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

## Fluxos disponíveis

- `GET /api/health` (health-check)
- `GET /login` (fluxo inicial de autenticação)
- `POST /api/auth/login` (mock de autenticação para evolução incremental)

### Exemplo de payload login

```json
{
  "email": "aluno@mandabrain.com",
  "password": "12345678"
}
```

## CI

Workflow de testes automatizados para o frontend:

- `.github/workflows/web-ci.yml`

## Próximos passos

1. Substituir mock de login por integração com backend real.
2. Introduzir persistência de sessão segura (cookies httpOnly / JWT com refresh).
3. Iniciar módulo backend v2 com PostgreSQL e migrações.
