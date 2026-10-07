<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacoes extends Model
{
    use HasFactory;

    protected $table = 'tbl_publicacoes';

    protected $primaryKey = 'id_publicacoes';

    const CREATED_AT = 'data_criacao_publicacoes';
    const UPDATED_AT = 'data_atualizacao_publicacoes';

    protected $fillable = [
        'titulo_publicacoes',
        'descricao_publicacoes',
        'imagem_publicacoes',
        'link_publicacoes',
        'data_publicacoes',
    ];
}