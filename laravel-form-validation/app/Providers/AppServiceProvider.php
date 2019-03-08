<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //
    }
}
