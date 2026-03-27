# Infra local paralela (legado + v2)

Este ambiente sobe os dois bancos em paralelo para permitir validação e migração incremental:

- MySQL 8 (legado): `localhost:3307`
- PostgreSQL 16 (v2): `localhost:5432`

## Subir ambiente

```bash
docker compose up -d
```

## Derrubar ambiente

```bash
docker compose down
```

## Derrubar removendo volumes

```bash
docker compose down -v
```

## Credenciais padrão

### MySQL (legado)
- Host: `localhost`
- Porta: `3307`
- Database: `mandabrain_legacy`
- User: `mandabrain`
- Password: `mandabrain`
- Root password: `root_legacy`

### PostgreSQL (v2)
- Host: `localhost`
- Porta: `5432`
- Database: `mandabrain_v2`
- User: `mandabrain`
- Password: `mandabrain`

## Próximo passo recomendado

- Importar o dump legado no MySQL e começar mapeamento para o modelo PostgreSQL da v2.
