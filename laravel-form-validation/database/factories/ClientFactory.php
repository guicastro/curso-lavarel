<?php

use App\Client;
use Faker\Generator as Faker;

//Inclui as funções que foram criadas para dados aletórios
require_once __DIR__.'/../faker_data/cpf_cnpj.php';

$factory->define(Client::class, function (Faker $faker) {

    $cpfs = cpfs();
    $cnpjs = cnpjs();

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
        'deficiencia' => rand(1,10) % 2 == 0 ? $faker->word : null //resto da divisão de número aleatório, se dor 0 retorna uma palavra aleatória, senão null
    ];
});