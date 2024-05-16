<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $hidden=
    [];

    protected $appends=
    [];


    //----------------> Getters <-------------------

    /**
     * pega o atributo categoria
     *
     */

    public function getCategoriaAttribute()
    {
        return $this->categoriaRelationship;
    }

    /**
     * pega o atributo endereco
     *
     */

    public function getEnderecoAttribute()
    {
        return $this->enderecoRelationship;
    }

    /**
     * pega o atributo telefone
     *
     */
    public function getTelefoneNumeroAttribute()
    {
        return $this->telefoneNumeroRelationship;
    }

    //----------------> Setters <-------------------


    /**
     * Seta o atributo categoria para o contato
     *
     */
    public function setCategoriaAttribute($value)
    {
        $this->categoriaRelationship()->sync($value);
    }

    // -----------------> metodos de relacionamento <---------------------

    /**
     * Pega o relacionamento de um para um entre a model Contato e a model Endereco
     * @return Endereco
     */
     public function enderecoRelationship()
     {
      return $this->hasOne(Endereco::class,'contato_id');
     }
     /**
      * Pega o relacionamento de um para muitos entre a model Contato e a model TelefoneNumero
      * @return TelefoneNumero
      */
     public function telefoneNumeroRelationship()
     {
      return $this->hasMany(TelefoneNumero::class,'contato_id');
     }

     /**
      * Pega o relacionamento de muitos para muitos entre a model Contato e a model Categoria
      * @return Categoria
      */

     public function categoriaRelationship()
     {
         return $this->belongsToMany(Categoria::class, 'categorias_has_contatos', 'contato_id', 'categoria_id'); //[classe_da_model->tabela_pivot->id_da_tabela(associada_a_classe_passada_no_primeiro_argumento)->id_da_outra_tabela]
     }




}
