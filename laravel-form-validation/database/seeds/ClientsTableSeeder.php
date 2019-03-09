<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Indica o que fazer quando roda a Seeder, por exemplo preencher a tabela com dados de exemplo da Factory
        
        //Seeder do TIpo de Cliente PF
        factory(\App\Client::class, 5)->states(array_keys(\App\Client::TIPO_CLIENTE)[0])->create();
        
        //Seeder do TIpo de Cliente PJ
        factory(\App\Client::class, 5)->states(array_keys(\App\Client::TIPO_CLIENTE)[1])->create();
    }
}
