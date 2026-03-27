# Plano de modernização do MandaBrain

Este documento propõe uma evolução incremental do projeto original em PHP puro para uma arquitetura moderna, mantendo o sistema funcionando durante a migração.

## 1) Diagnóstico atual (rápido)

Pelos arquivos atuais, o projeto concentra:

- Backend e views misturados no mesmo arquivo PHP.
- SQL montado por concatenação de string em múltiplos pontos.
- Login com `base64` (não é hashing seguro para senha).
- Configuração de banco fixa no código-fonte.
- Banco legado em MySQL/MyISAM com poucas restrições relacionais.

## 2) Stack alvo recomendada

### Backend

- **Node.js + NestJS (TypeScript)**
  - Organização em módulos e camadas.
  - Validação forte com DTOs.
  - Facilidade para API REST e evolução futura para microserviços.

> Alternativa igualmente válida: Laravel 11 (PHP moderno), se você quiser manter ecossistema PHP.

### Banco de dados

- **PostgreSQL 16+**
  - Integridade relacional forte.
  - Bom suporte a índices, JSONB e migrações seguras.

### ORM e migrações

- **Prisma ORM** (se optar por NestJS)
  - Schema versionado.
  - Migrations previsíveis.

### Frontend

- **Next.js (React + TypeScript)**
  - Excelente DX e componentização.
  - SSR/SSG quando necessário.
  - Fácil integração com API e autenticação moderna.

### Autenticação

- JWT com refresh token + rotação
- Hash de senha com **Argon2id** ou **bcrypt**

### Infra/DevOps

- Docker + Docker Compose (dev)
- GitHub Actions (lint, test, build)
- Deploy inicial em Render/Railway/Fly.io/Vercel (front)

## 3) Estratégia de migração (sem “big bang”)

### Fase 0 — Preparação (1 semana)

1. Definir domínio e funcionalidades essenciais (MVP).
2. Criar repositório “v2” com backend + frontend + infra.
3. Levantar modelo de dados alvo no PostgreSQL.

### Fase 1 — Fundamentos (1 a 2 semanas)

1. Subir API NestJS com módulos base:
   - auth
   - users
   - courses
   - classes (salas)
   - files/uploads
2. Configurar Prisma + migrações.
3. Implementar autenticação segura (login, refresh, logout).


## 3.1) Status atual da Fase 1 — Fundamentos

### ✅ Já concluído

- API v2 iniciada em `apps/api` com NestJS e módulos base:
  - `auth`
  - `users`
  - `courses`
  - `classes`
  - `files`
- Prisma configurado com schema inicial e migração SQL versionada.
- Fluxo de autenticação seguro implementado (login, refresh, logout) com:
  - hash de senha com `bcryptjs`;
  - emissão de `accessToken` e `refreshToken`;
  - rotação simples de refresh token.
- Testes unitários iniciais da camada de auth adicionados.

### 🔜 Próxima fase recomendada

Com os fundamentos fechados, o próximo foco é a **Fase 2 (Frontend novo conectado à API real)**.

### Fase 2 — Frontend novo (2 a 4 semanas)

1. Criar layout e design system básico.
2. Telas prioritárias:
   - login/cadastro
   - home aluno/professor
   - listagem e detalhe de cursos
   - administração básica
3. Conectar frontend na nova API.

### Fase 3 — Migração de dados (1 a 2 semanas)

1. Exportar dados do MySQL legado.
2. Criar script ETL para mapear tabelas para schema novo.
3. Validar consistência (contagem, chaves e campos críticos).

### Fase 4 — Cutover (1 semana)

1. Rodar sistema antigo e novo em paralelo por alguns dias.
2. Monitorar erros e ajustar.
3. Virar tráfego oficialmente para o v2.

## 4) Backlog técnico prioritário

1. Segurança:
   - trocar `base64` por hashing forte de senha;
   - remover SQL concatenado e usar queries parametrizadas;
   - adicionar rate-limit em login.
2. Qualidade:
   - testes unitários e de integração;
   - lint/format automatizados;
   - tratamento padronizado de erros.
3. Produto:
   - melhorar UX do fluxo de cadastro e administração;
   - painéis por perfil (aluno, professor, admin).

## 5) Roadmap sugerido (90 dias)

- **Dias 1–15:** arquitetura, auth, usuários, CI/CD
- **Dias 16–45:** cursos/salas/arquivos + frontend principal
- **Dias 46–70:** migração de dados + validação
- **Dias 71–90:** estabilização, observabilidade e go-live

## 6) Primeiros passos práticos (esta semana)

1. Congelar novas features no legado (somente correções críticas).
2. Definir escopo do MVP v2 em uma página.
3. Criar esquema inicial do banco no PostgreSQL.
4. Iniciar API de autenticação e cadastro de usuários.
5. Publicar protótipo de telas de login + dashboard.

## 7) Estrutura de pastas sugerida (v2)

```txt
mandabrain-v2/
  apps/
    api/        # NestJS
    web/        # Next.js
  packages/
    ui/         # componentes compartilhados
    config/     # eslint/tsconfig/shared
  infra/
    docker/
  docs/
```

## 8) Critérios de sucesso

- Tempo de cadastro/login mais rápido e com menos falhas.
- Redução de erros críticos de segurança.
- Base de código com testes e padrão de arquitetura.
- Deploy reproduzível com CI/CD.

---

Se você quiser, o próximo passo é eu abrir um **plano técnico detalhado por feature** (auth, usuários, cursos, salas, arquivos), incluindo modelo de dados inicial e endpoints da API para começar a codar.
