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

## Usuários mock para login

> O mock aceita qualquer e-mail válido com senha de no mínimo 8 caracteres.

- **Admin**: e-mail contendo `admin`
  - Exemplo: `admin@mandabrain.com`
- **Professor**: e-mail contendo `prof`
  - Exemplo: `prof.julia@mandabrain.com`
- **Aluno**: qualquer outro e-mail válido
  - Exemplo: `aluno@mandabrain.com`

Senha sugerida para testes: `12345678`.

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


## Backend v2 (Fase 1 concluída)

A API base em NestJS foi criada em `mandabrain-v2/apps/api` com módulos:

- `auth`
- `users`
- `courses`
- `classes`
- `files`

Para executar:

```bash
cd mandabrain-v2/apps/api
cp .env.example .env
npm install
npm run prisma:generate
npm run prisma:migrate
npm run test
npm run start:dev
```

## Docker Compose (legado + v2)

Você pode subir MySQL legado + PostgreSQL v2 em paralelo por **qualquer um** dos arquivos:

- `./docker-compose.yml` (raiz do repositório)
- `./mandabrain-v2/docker-compose.yml`

Comando (na raiz):

```bash
docker compose up -d
```

Comando (dentro de `mandabrain-v2`):

```bash
cd mandabrain-v2
docker compose up -d
```

## Objetivo da etapa atual

- Validar navegação e estrutura de produto com dados mock.
- Padronizar UI para acelerar próximas features.
- Manter evolução coberta por testes em cada etapa.
