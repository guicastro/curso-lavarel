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
        factory(\App\Client::class, 5)->create();
    }
}
