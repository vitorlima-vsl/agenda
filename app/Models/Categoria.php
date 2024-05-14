<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $hidden=
    [

    ];

    protected $appends=
    [

    ];

    public function contatoRelationship()
    {
        return $this->belongsToMany(Categoria::class, 'categorias_has_contatos', 'categoria_id', 'contato_id'); //model->tabela_pivot->id_da_tabela->id_da_outra_tabela
    }

}
