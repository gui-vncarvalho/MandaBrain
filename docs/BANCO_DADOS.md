# Como visualizar o banco de dados (legado e v2)

## 1) Banco legado (MySQL do projeto atual)

O dump está em `mandabrain.sql`.

### Opção A — via DBeaver / DataGrip / TablePlus

1. Crie uma conexão MySQL.
2. Host: `127.0.0.1`
3. Porta: `3306`
4. Usuário: `root` (ou o usuário do seu ambiente)
5. Banco: `mandabrain`
6. Importe o dump `mandabrain.sql`.

### Opção B — via terminal

```bash
mysql -u root -p
CREATE DATABASE IF NOT EXISTS mandabrain;
USE mandabrain;
SOURCE mandabrain.sql;
SHOW TABLES;
```

## 2) Consultas úteis para entendimento rápido

```sql
-- Listar tabelas
SHOW TABLES;

-- Ver estrutura da tabela de usuários
DESCRIBE usuario;

-- Amostra de usuários
SELECT idUsuario, nome, email, idTipoUsuario FROM usuario LIMIT 20;
```

## 3) Banco v2 (quando subirmos PostgreSQL)

Na etapa de backend v2, vamos introduzir PostgreSQL + migrações versionadas.

Ferramentas recomendadas:
- DBeaver
- pgAdmin
- DataGrip

Comandos úteis no PostgreSQL:

```bash
psql "postgresql://usuario:senha@localhost:5432/mandabrain_v2"
\dt
```

---

Se quiser, no próximo passo eu já te entrego `docker-compose.yml` com MySQL (legado) + PostgreSQL (v2) para você visualizar os dois bancos em paralelo.
