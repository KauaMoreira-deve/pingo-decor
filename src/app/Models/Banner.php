<?php

namespace App\Models;

use App\Support\PublicImageStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Nome explícito da tabela no banco de dados
    protected $table = 'tbl_banner';

    // Chave primária personalizada
    protected $primaryKey = 'id_banner';

    // Mapeamento das colunas de data/timestamp
    const CREATED_AT = 'data_criacao_banner';
    const UPDATED_AT = 'data_atualizacao_banner';

    // Campos que podem ser preenchidos via Mass Assignment
    protected $fillable = [
        'titulo_banner',
        'imagem_banner',
        'status_banner',
    ];

    public function imageUrl(string $fallbackAsset = 'pingo-decor/assets/imagem-indisponivel.svg'): string
    {
        return PublicImageStorage::url($this->imagem_banner, $fallbackAsset);
    }
}
