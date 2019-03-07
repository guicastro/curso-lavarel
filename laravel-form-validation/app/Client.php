<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    const ESTADO_CIVIL = [
        1 => 'Solteiro(a)',
        2 => 'Casado(a)',
        3 => 'Divorciado(a)',
        4 => 'Viúvo(a)'
    ];

    //recurso para indicar quais são os campos que serão enviados como mass assignment que permite enviar um create sem precisar especificar cada campo no Request
    protected $fillable = ['nome',
                            'documento',
                            'email',
                            'celular',
                            'status',
                            'dt_nascimento',
                            'sexo',
                            'estado_civil',
                            'deficiencia'];
}
