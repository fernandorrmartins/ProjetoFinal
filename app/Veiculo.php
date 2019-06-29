<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = ['Identificador', 'AnoLancamento', 'Marca', 'Descricao', 'TipoVeiculo', 'Imagem'];
}
