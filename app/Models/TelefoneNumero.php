<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelefoneNumero extends Model
{
    protected $hidden=
    [
        'created_at',
        'updated_at'
    ];

    protected $appends=
    [

    ];

    protected $fillable = [
        'numero',
        'tipo',
        'contato_id'
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
