<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Chama todas as Seeders que deseja acionar quando for chamado o comando de Seeder do banco de dados
        $this->call(ClientsTableSeeder::class);
    }
}
