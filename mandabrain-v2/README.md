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
cp .env.example .env.local
npm install
npm run test
npm run dev
```

## Sessão assinada

A sessão usa token assinado por HMAC SHA-256.

- Variável necessária: `SESSION_SECRET` (`.env.local`)
- Recomendação: valor com 32+ caracteres
- Cookie: `mb_session` (httpOnly, sameSite=lax)

## Fluxos disponíveis

- `GET /api/health` (health-check)
- `GET /login` (fluxo inicial de autenticação)
- `POST /api/auth/login` (login com criação de cookie httpOnly assinado)
- `GET /api/auth/me` (retorna usuário da sessão)
- `POST /api/auth/refresh` (renova expiração da sessão)
- `POST /api/auth/logout` (encerra sessão)
- `GET /dashboard` (rota protegida por middleware)

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
2. Implementar refresh token com rotação e revogação no backend.
3. Iniciar módulo backend v2 com PostgreSQL e migrações.
