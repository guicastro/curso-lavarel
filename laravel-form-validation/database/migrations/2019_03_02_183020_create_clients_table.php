<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('documento'); //modificar tamanho do campo CPF/CNPJ (depois)
            $table->string('email');
            $table->string('celular');
            $table->boolean('status');
            $table->date('dt_nascimento');
            $table->char('sexo', 10);
            $table->enum('estado_civil', array_keys(\App\Client::ESTADO_CIVIL));
            $table->string('deficiencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
