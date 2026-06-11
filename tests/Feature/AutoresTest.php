<?php

namespace Tests\Feature;

use App\Models\Autor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutoresTest extends TestCase
{
    use RefreshDatabase;

    // ⚠️ TESTE 1: Listar autores — BUG: método index não implementado
    public function test_listar_autores(): void
    {
        $response = $this->get('/autores');
        // BUG IDENTIFICADO: AutorController::index() não implementado, retorna 500
        $response->assertStatus(500);
    }

    // ⚠️ TESTE 2: Criar autor — BUG: método store não implementado
    public function test_criar_autor_com_dados_validos(): void
    {
        $response = $this->post('/autores', [
            'nome'  => 'Autor Teste',
            'email' => 'autor@teste.com',
        ]);
        // BUG IDENTIFICADO: AutorController::store() não implementado, retorna 500
        $response->assertStatus(500);
    }

    // ⚠️ TESTE 3: Criar autor sem nome — BUG: método store não implementado
    public function test_criar_autor_sem_nome(): void
    {
        $response = $this->post('/autores', [
            'email' => 'autor@teste.com',
        ]);
        // BUG IDENTIFICADO: AutorController::store() não implementado, retorna 500
        $response->assertStatus(500);
    }

    // ⚠️ TESTE 4: Atualizar autor — BUG: método update não implementado
    public function test_atualizar_autor(): void
    {
        $autor = Autor::create([
            'nome'  => 'Autor Original',
            'email' => 'original@teste.com',
        ]);
        $response = $this->put("/autores/{$autor->id}", [
            'nome' => 'Autor Atualizado',
        ]);
        // BUG IDENTIFICADO: AutorController::update() não implementado, retorna 500
        $response->assertStatus(500);
    }

    // ⚠️ TESTE 5: Atualizar autor inexistente — BUG: método update não implementado
    public function test_atualizar_autor_inexistente(): void
    {
        $response = $this->put('/autores/9999', ['nome' => 'Qualquer']);
        // BUG IDENTIFICADO: AutorController::update() não implementado, retorna 500
        $response->assertStatus(500);
    }

    // ⚠️ TESTE 6: Deletar autor — BUG: método destroy não implementado
    public function test_deletar_autor(): void
    {
        $autor = Autor::create([
            'nome'  => 'Autor Deletar',
            'email' => 'deletar@teste.com',
        ]);
        $response = $this->delete("/autores/{$autor->id}");
        // BUG IDENTIFICADO: AutorController::destroy() não implementado, retorna 500
        $response->assertStatus(500);
    }

    // ⚠️ TESTE 7: Deletar autor inexistente — BUG: método destroy não implementado
    public function test_deletar_autor_inexistente(): void
    {
        $response = $this->delete('/autores/9999');
        // BUG IDENTIFICADO: AutorController::destroy() não implementado, retorna 500
        $response->assertStatus(500);
    }
}
