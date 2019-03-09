<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Identifica a Plataforma de Banco de Dados que está sendo utilizada (métodos do Doctrine)
        $platform = \Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform();

        //Mapeia a troca para indicar ao Doctrine que quando for enviado um tipo de campo enum, deve-se trocar para string
        $platform->registerDoctrineTypeMapping('enum','string');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /*#### Cria um Validador Personalizado ####*/
        \Validator::extend('valida_cpf_cnpj', function($attribute, $value, $parameters, $validator) {

            //o nome valida_cpf_cnpj é o nome da regra para validar
            //realizar as validações
            //returna TRUE ou FALSE

            return true;
        });
        /*#### Cria um Validador Personalizado ####*/
    }
}
