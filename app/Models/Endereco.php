<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
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
        'rua',
        'numero',
        'cidade',
        'contato_id'
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
