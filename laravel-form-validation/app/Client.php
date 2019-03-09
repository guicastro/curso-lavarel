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

    const TIPO_CLIENTE = [
        'PF' => 'Pessoa Física',
        'PJ' => 'Pessoa Jurídica'
    ];

    const SEXO = [
        'm' => 'Masculino',
        'f' => 'Feminino'
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
                            'deficiencia',
                            'tipo_cliente',
                            'nome_fantasia'];
    
    public static function getClientType($type) {

        return in_array($type, array_keys(Client::TIPO_CLIENTE)) ? $type : array_keys(Client::TIPO_CLIENTE)[0];
    }
}
