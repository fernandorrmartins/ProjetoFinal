<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Marca;

class Veiculo extends Model
{
    protected $fillable = ['ano_lancamento', 'marca', 'descricao', 'tipo_veiculo', 'imagem'];
}
