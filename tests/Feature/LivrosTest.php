<?php

namespace Tests\Feature;

use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivrosTest extends TestCase
{
    use RefreshDatabase;

    // ✅ TESTE 1: Listar livros
    public function test_listar_livros(): void
    {
        $response = $this->get('/livros');
        $response->assertStatus(200);
    }

    // ✅ TESTE 2: Criar livro com dados válidos
    public function test_criar_livro_com_dados_validos(): void
    {
        $response = $this->post('/livros', [
            'titulo'  => 'Livro Teste',
            'autor'   => 'Autor Teste',
            'editora' => 'Editora Teste',
        ]);
        $this->assertDatabaseHas('livros', ['titulo' => 'Livro Teste']);
    }

    // ✅ TESTE 3: Criar livro sem título
    public function test_criar_livro_sem_titulo(): void
    {
        $response = $this->post('/livros', [
            'autor' => 'Autor Teste',
        ]);
        $response->assertSessionHasErrors();
    }

    // ✅ TESTE 4: Atualizar livro existente
    public function test_atualizar_livro(): void
    {
        $livro = Livro::create([
            'titulo'  => 'Livro Original',
            'autor'   => 'Autor Original',
            'editora' => 'Editora Original',
        ]);
        $this->put("/livros/{$livro->id}", [
            'titulo' => 'Livro Atualizado',
        ]);
        $this->assertDatabaseHas('livros', ['titulo' => 'Livro Atualizado']);
    }

    // ✅ TESTE 5: Atualizar livro inexistente
    public function test_atualizar_livro_inexistente(): void
    {
        $response = $this->put('/livros/9999', ['titulo' => 'Qualquer']);
        $response->assertStatus(404);
    }

    // ✅ TESTE 6: Deletar livro existente
    public function test_deletar_livro(): void
    {
        $livro = Livro::create([
            'titulo'  => 'Livro Deletar',
            'autor'   => 'Autor Teste',
            'editora' => 'Editora Teste',
        ]);
        $this->delete("/livros/{$livro->id}");
        $this->assertDatabaseMissing('livros', ['id' => $livro->id]);
    }

    // ✅ TESTE 7: Deletar livro inexistente
    public function test_deletar_livro_inexistente(): void
    {
        $response = $this->delete('/livros/9999');
        $response->assertStatus(404);
    }
}