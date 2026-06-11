<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    //
    protected $fillable = [
        'titulo',
        'isbn',
        'data_publicacao',
        'autor_id',
    ];

    protected $table = 'livros';

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}
