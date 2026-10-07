<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;

    protected $table = 'tbl_projetos';

    protected $primaryKey = 'id_projetos';

    const CREATED_AT = 'data_criacao_projetos';
    const UPDATED_AT = 'data_atualizacao_projetos';

    protected $fillable = [
        'id_projetos',
        'nome_projetos',
        'imagem_projetos',
        'status_projetos',
        
    ];
}