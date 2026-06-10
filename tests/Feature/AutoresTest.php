<?php

namespace Tests\Feature;

use App\Models\Autor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutoresTest extends TestCase
{
    use RefreshDatabase;

    // ✅ TESTE 1: Listar autores
    public function test_listar_autores(): void
    {
        $response = $this->get('/autores');
        $response->assertStatus(200);
    }

    // ✅ TESTE 2: Criar autor com dados válidos
    public function test_criar_autor_com_dados_validos(): void
    {
        $response = $this->post('/autores', [
            'nome' => 'Autor Teste',
            'email' => 'autor@teste.com',
        ]);
        $this->assertDatabaseHas('autores', ['nome' => 'Autor Teste']);
    }

    // ✅ TESTE 3: Criar autor sem nome
    public function test_criar_autor_sem_nome(): void
    {
        $response = $this->post('/autores', [
            'email' => 'autor@teste.com',
        ]);
        $response->assertSessionHasErrors();
    }

    // ✅ TESTE 4: Atualizar autor existente
    public function test_atualizar_autor(): void
    {
        $autor = Autor::create([
            'nome'  => 'Autor Original',
            'email' => 'original@teste.com',
        ]);
        $this->put("/autores/{$autor->id}", [
            'nome' => 'Autor Atualizado',
        ]);
        $this->assertDatabaseHas('autores', ['nome' => 'Autor Atualizado']);
    }

    // ✅ TESTE 5: Atualizar autor inexistente
    public function test_atualizar_autor_inexistente(): void
    {
        $response = $this->put('/autores/9999', ['nome' => 'Qualquer']);
        $response->assertStatus(404);
    }

    // ✅ TESTE 6: Deletar autor existente
    public function test_deletar_autor(): void
    {
        $autor = Autor::create([
            'nome'  => 'Autor Deletar',
            'email' => 'deletar@teste.com',
        ]);
        $this->delete("/autores/{$autor->id}");
        $this->assertDatabaseMissing('autores', ['id' => $autor->id]);
    }

    // ✅ TESTE 7: Deletar autor inexistente
    public function test_deletar_autor_inexistente(): void
    {
        $response = $this->delete('/autores/9999');
        $response->assertStatus(404);
    }
}