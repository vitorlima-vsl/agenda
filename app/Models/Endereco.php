<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $hidden=
    [

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
