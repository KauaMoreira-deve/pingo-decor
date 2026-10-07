<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'tbl_contato';

    // Chave primária
    protected $primaryKey = 'id_contato';

    // Se a tabela não utilizar os campos padrão created_at / updated_at
    const CREATED_AT = 'data_criacao_contato';

    const UPDATED_AT = 'data_atualizacao_contato';

    // Campos permitidos para atribuição em massa
    protected $fillable = [
        'nome_contato',
        'nome_companheiro_contato',
        'nome_idade_criancas_contato',
        'email_contato',
        'telefone_contato',
        'cidade_bairro_contato',
        'profissao_contato',
        'origem_contato',
        'ajuda_contato',
        'metragem_contato',
        'quantidades_ambientes_contato',
        'trimestre_gestacao_contato',
        'prazo_contato',
        'detalhes_contato',
    ];
}
