<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $hidden=
    [

    ];

    protected $appends=
    [


   ];
   public function enderecoRelationship()
   {
    return $this->hasOne(Endereco::class,'contato_id');
   }
   public function telefoneRelationship()
   {
    return $this->hasMany(TelefoneNumero::class,'contato_id');
   }

   public function categoriaRelationship()
    {
        return $this->belongsToMany(Categoria::class, 'categorias_has_contatos', 'categoria_id', 'contato_id'); //model->tabela_pivot->id_da_tabela->id_da_outra_tabela
    }
}
