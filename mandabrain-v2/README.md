# MandaBrain v2 (frontend)

Migração incremental do frontend legado para Next.js, mantendo o PHP atual intacto.

## Stack desta fase

- Next.js 14 + TypeScript
- Tailwind CSS + componentes no padrão shadcn/ui
- Vitest para testes unitários
- Sessão assinada em cookie `httpOnly`

## Execução local

```bash
cd mandabrain-v2/apps/web
cp .env.example .env.local
npm install
npm run test
npm run dev
```

## Sessão assinada

- Variável obrigatória: `SESSION_SECRET`
- Recomendação: segredo com 32+ caracteres
- Cookie: `mb_session` (`httpOnly`, `sameSite=lax`)

## Fluxos implementados

- `GET /api/health`
- `GET /login`
- `POST /api/auth/login`
- `GET /api/auth/me`
- `POST /api/auth/refresh`
- `POST /api/auth/logout`
- `GET /dashboard` (protegida)
- `GET /cursos` (protegida, mock)
- `GET /cursos/[slug]` (protegida, mock)

## Objetivo da etapa atual

- Validar navegação e estrutura de produto com dados mock.
- Padronizar UI para acelerar próximas features.
- Manter evolução coberta por testes em cada etapa.
