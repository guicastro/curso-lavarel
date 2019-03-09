<?php

use App\Client;
use Faker\Generator as Faker;

//Inclui as funções que foram criadas para dados aletórios
require_once __DIR__.'/../faker_data/cpf_cnpj.php';

/*#### ESTADO DE DADOS COMUM A TODOS ####*/
$factory->define(Client::class, function (Faker $faker) {

    return [
        //
        'email' => $faker->email,
        'celular' => $faker->phonenumber,
        'status' => $faker->boolean,
    ];
});
/*#### ESTADO DE DADOS COMUM A TODOS ####*/




/*#### ESTADO DE DADOS DE CLIENTE TIPO PF ####*/
$factory->state(\App\Client::class, array_keys(\App\Client::TIPO_CLIENTE)[0], function(Faker $faker) {

    $cpfs = cpfs();

    return [
        //
        'nome' => $faker->name,
        'documento' => $cpfs[array_rand($cpfs, 1)], //retorna uma Key aleatoria da $cpfs
        'email' => $faker->email,
        'celular' => $faker->phonenumber,
        'status' => $faker->boolean,
        'dt_nascimento'  => $faker->date,
        'sexo' => rand(1,10) % 2 == 0 ? 'm' : 'f', //resto da divisão de número aleatório, se dor 0 retorna M, senão returna F
        'estado_civil' => rand(1,4),
        'deficiencia' => rand(1,10) % 2 == 0 ? $faker->word : null, //resto da divisão de número aleatório, se dor 0 retorna uma palavra aleatória, senão null
        'tipo_cliente' => array_keys(\App\Client::TIPO_CLIENTE)[0] //retorna uma Key aleatoria da $cnpjs
    ];   
});
/*#### ESTADO DE DADOS DE CLIENTE TIPO PF ####*/



/*#### ESTADO DE DADOS DE CLIENTE TIPO PJ ####*/
$factory->state(\App\Client::class, array_keys(\App\Client::TIPO_CLIENTE)[1], function(Faker $faker) {

    $cnpjs = cnpjs();

    return [
        //
        'nome_fantasia' => $faker->company,
        'documento' => $cnpjs[array_rand($cnpjs, 1)], //retorna uma Key aleatoria da $cnpjs
        'tipo_cliente' => array_keys(\App\Client::TIPO_CLIENTE)[1] //retorna uma Key aleatoria da $cnpjs
    ];   
});
/*#### ESTADO DE DADOS DE CLIENTE TIPO PJ ####*/
