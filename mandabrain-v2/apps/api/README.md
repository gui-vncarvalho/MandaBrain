# MandaBrain API v2 (Fase 1)

API base em NestJS para fechar a fase de Fundamentos do plano de modernização.

## Módulos base implementados

- `auth`
- `users`
- `courses`
- `classes`
- `files`

## Stack

- NestJS 10
- Prisma ORM
- PostgreSQL
- JWT (access + refresh)
- bcryptjs para hash de senha

## Configuração local

```bash
cd mandabrain-v2/apps/api
cp .env.example .env
npm install
npm run prisma:generate
npm run prisma:migrate
npm run test
npm run start:dev
```

## Endpoints iniciais

- `POST /api/auth/login`
- `POST /api/auth/refresh`
- `POST /api/auth/logout`
- `GET /api/users`
- `GET /api/courses`
- `GET /api/classes`
- `GET /api/files/health`

## Usuários mock para login

Todos com senha `12345678`:

- `admin@mandabrain.com`
- `prof.julia@mandabrain.com`
- `aluno@mandabrain.com`
