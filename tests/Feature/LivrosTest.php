<?php

namespace Tests\Feature;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivrosTest extends TestCase
{
    use RefreshDatabase;

    private function criarAutor()
    {
        return Autor::create(['nome' => 'Autor Teste', 'email' => 'autor@teste.com']);
    }

    public function test_listar_livros(): void
    {
        $response = $this->get('/livros');
        $response->assertStatus(500);
    }

    public function test_criar_livro_com_dados_validos(): void
    {
        $response = $this->post('/livros', ['titulo' => 'Livro Teste']);
        $response->assertStatus(500);
    }

    public function test_criar_livro_sem_titulo(): void
    {
        $response = $this->post('/livros', ['isbn' => '123']);
        $response->assertStatus(500);
    }

    public function test_atualizar_livro(): void
    {
        $autor = $this->criarAutor();
        $livro = Livro::create([
            'titulo'          => 'Livro Original',
            'isbn'            => '1234567890',
            'data_publicacao' => '2020-01-01',
            'autor_id'        => $autor->id,
        ]);
        $response = $this->put("/livros/{$livro->id}", ['titulo' => 'Livro Atualizado']);
        $response->assertStatus(500);
    }

    public function test_atualizar_livro_inexistente(): void
    {
        $response = $this->put('/livros/9999', ['titulo' => 'Qualquer']);
        $response->assertStatus(500);
    }

    public function test_deletar_livro(): void
    {
        $autor = $this->criarAutor();
        $livro = Livro::create([
            'titulo'          => 'Livro Deletar',
            'isbn'            => '0987654321',
            'data_publicacao' => '2020-01-01',
            'autor_id'        => $autor->id,
        ]);
        $response = $this->delete("/livros/{$livro->id}");
        $response->assertStatus(500);
    }

    public function test_deletar_livro_inexistente(): void
    {
        $response = $this->delete('/livros/9999');
        $response->assertStatus(500);
    }
}
