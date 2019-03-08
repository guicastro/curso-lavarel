<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alter01ClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {

            $tpEstadoCivilEnum = $this->EstadoCivilString();

            $table->string('documento')->unique()->change(); //adicionar o método change() do final para informar que deve-se proceder com uma alteração do campo
            $table->string('celular')->nullable()->change();
            $table->date('dt_nascimento')->nullable()->change();
            //$table->char('sexo', 10)->nullable()->change();
            \DB::statement('ALTER TABLE clients CHANGE COLUMN sexo sexo CHAR NULL'); //alguns tipos de campo não permitem alteração pelo método padrão, sendo necessário fazer uma SQL manual de modificação
            //$table->enum('estado_civil', array_keys(\App\Client::ESTADO_CIVIL))->nullable()->change();
            \DB::statement("ALTER TABLE clients CHANGE COLUMN estado_civil estado_civil ENUM($tpEstadoCivilEnum) NULL"); //alguns tipos de campo não permitem alteração pelo método padrão, sendo necessário fazer uma SQL manual de modificação
            $table->string('nome_fantasia')->nullable(); //este é um novo campo, portanto não adiciona o change()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Esta método RETORNA as alterações que foram feitas

        Schema::table('clients', function (Blueprint $table) {

            $tpEstadoCivilEnum = $this->EstadoCivilString();

            $table->dropUnique('clients_documento_unique'); //como a alteração é para criar uma Unique aqui deve-se excluir a Unique. O padrão de nome do Laravel para Unique é NomeDaTabela_NomeDoCampo_unique
            $table->string('celular')->change();
            $table->date('dt_nascimento')->change();
            // $table->char('sexo', 10)->change();
            \DB::statement('ALTER TABLE clients CHANGE COLUMN sexo sexo CHAR NOT NULL');
            // $table->enum('estado_civil', array_keys(\App\Client::ESTADO_CIVIL))->change();
            \DB::statement("ALTER TABLE clients CHANGE COLUMN estado_civil estado_civil ENUM($tpEstadoCivilEnum) NOT NULL");
            $table->dropColumn('nome_fantasia'); //apaga a coluna
        });
    }

    protected function EstadoCivilString() {

        $tpEstadoCivil = array_keys(\App\Client::ESTADO_CIVIL); //Pega todas as opções da constante
        $tpEstadoCivilString = array_map(function($value) {
            return "'$value'";
        }, $tpEstadoCivil); //Converte as Keys para String
        $tpEstadoCivilEnum = implode(',', $tpEstadoCivilString); //Junta as Keys em uma única string

        //Retorna a String já pronta para utilização
        return $tpEstadoCivilEnum;

    }
}
