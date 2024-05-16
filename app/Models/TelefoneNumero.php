<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelefoneNumero extends Model
{
    protected $hidden=
    [

    ];

    protected $appends=
    [

    ];


    // ----------------> Setters <-------------------

    /**
     * Seta o atributo contato_id
     * 
     */

    public function setTelefoneNumeroAttribute($value)
    {
        if(isset($value)){
            $this->attributes['contato_id'] = TelefoneNumero::where('id', $value)->first()->id;
        }
    }


}
