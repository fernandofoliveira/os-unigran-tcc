<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $fillable = ['id_cliente', 'id_servico', 'descricao', 'status', 'prazo_estimado', 'data_conclusão'];

}
