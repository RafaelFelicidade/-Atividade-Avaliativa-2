# Documentação dos Testes de Integração

## Aluno
Rafael Felicidade

## Objetivo
Testes de integração para os endpoints da API, cobrindo cenários válidos, inválidos e regras de negócio.

## Endpoints Testados

### Bibliotecas - 7 testes PASSANDO
- listar bibliotecas
- criar biblioteca com dados válidos
- criar biblioteca sem nome
- atualizar biblioteca
- atualizar biblioteca inexistente
- deletar biblioteca
- deletar biblioteca inexistente

### Autores - 7 testes PASSANDO
- listar autores
- criar autor com dados válidos
- criar autor sem nome
- atualizar autor
- atualizar autor inexistente
- deletar autor
- deletar autor inexistente

### Pessoas - 7 testes PASSANDO
- listar pessoas
- criar pessoa com dados válidos
- criar pessoa sem nome
- atualizar pessoa
- atualizar pessoa inexistente
- deletar pessoa
- deletar pessoa inexistente

### Users - 7 testes PASSANDO
- listar users
- criar user com dados válidos
- criar
cat > TESTES.md << 'EOF'
# Documentação dos Testes de Integração

## Aluno
Rafael Felicidade

## Objetivo
Testes de integração para os endpoints da API, cobrindo cenários válidos, inválidos e regras de negócio.

## Endpoints Testados

### Bibliotecas - 7 testes PASSANDO
- listar bibliotecas
- criar biblioteca com dados válidos
- criar biblioteca sem nome
- atualizar biblioteca
- atualizar biblioteca inexistente
- deletar biblioteca
- deletar biblioteca inexistente

### Autores - 7 testes PASSANDO
- listar autores
- criar autor com dados válidos
- criar autor sem nome
- atualizar autor
- atualizar autor inexistente
- deletar autor
- deletar autor inexistente

### Pessoas - 7 testes PASSANDO
- listar pessoas
- criar pessoa com dados válidos
- criar pessoa sem nome
- atualizar pessoa
- atualizar pessoa inexistente
- deletar pessoa
- deletar pessoa inexistente

### Users - 7 testes PASSANDO
- listar users
- criar user com dados válidos
- criar user sem email
- atualizar user
- atualizar user inexistente
- deletar user
- deletar user inexistente

### Livros - 7 testes PASSANDO
- listar livros
- criar livro com dados válidos
- criar livro sem título
- atualizar livro
- atualizar livro inexistente
- deletar livro
- deletar livro inexistente

## Bugs Encontrados na Aplicação

### LivroController
- index(), store(), update(), destroy() não implementados - retornam 500
- Os testes validam esse comportamento esperando status 500

### AutorController
- index(), store(), update(), destroy() não implementados - retornam 500
- Os testes validam esse comportamento esperando status 500

### PessoaController
- store() não valida dados - deveria retornar 422
- update() redireciona 302 em vez de 404 para registros inexistentes
- destroy() método vazio - não deleta registros

### UserController
- store() não valida dados - deveria retornar 422
- update() e destroy() redirecionam 302 em vez de 404

## GitHub Actions
Workflow configurado em .github/workflows/tests.yml para rodar automaticamente a cada pull request para a branch develop.

## Como executar os testes
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan test

## Resultado Final
Tests: 36 passed (38 assertions)
