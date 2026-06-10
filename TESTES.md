# Documentação dos Testes de Integração

## Aluno
Rafael Felicidade

## Objetivo
Testes de integração para os endpoints da API, cobrindo cenários válidos, inválidos e regras de negócio.

## Endpoints Testados

### Bibliotecas (`/bibliotecas`)

| # | Teste | Descrição | Status |
|---|-------|-----------|--------|
| 1 | listar bibliotecas | GET /bibliotecas retorna status 200 | ✅ Passou |
| 2 | criar biblioteca com dados válidos | POST com nome e endereço válidos | ✅ Passou |
| 3 | criar biblioteca sem nome | POST sem nome retorna erro de validação | ✅ Passou |
| 4 | atualizar biblioteca | PUT atualiza os dados corretamente | ✅ Passou |
| 5 | atualizar biblioteca inexistente | PUT com ID inválido retorna 404 | ✅ Passou |
| 6 | deletar biblioteca | DELETE remove o registro do banco | ✅ Passou |
| 7 | deletar biblioteca inexistente | DELETE com ID inválido retorna 404 | ✅ Passou |

## Problemas Encontrados

- As rotas de **Livros** e **Pessoas** ainda não foram implementadas na aplicação, portanto os testes para esses endpoints serão adicionados assim que o professor disponibilizar via Sync Fork.

## GitHub Actions

O workflow está configurado em `.github/workflows/tests.yml` e executa automaticamente a cada pull request para a branch `develop`.

## Como executar os testes

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan test
```
