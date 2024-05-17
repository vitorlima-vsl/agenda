<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $hidden=
    [
        'id',
        'contato_id',
        'created_at',
        'updated_at'
    ];

    protected $appends=
    [

    ];

    // ----------------> Setters <-------------------
    public function setEnderecoAttribute($value)
    {
       if(isset($value))
       {
        $this->attributes['contato_id'] = Contato::where('id', $value)->first()->id;
       }
    }
}
