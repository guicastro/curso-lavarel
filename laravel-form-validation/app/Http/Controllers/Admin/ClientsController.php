<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = \App\Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipoCliente = \App\Client::getClientType($request->tipo_cliente);
        return view('admin.clients.create', ['client' => new \App\Client(), 'tipoCliente' => $tipoCliente]); //foi passado na View de Create um model Client vazio apenas para que funcione a inclusão do formulário, para aproveitar o código e não dar erro
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VARIÁVEL PARA ARMAZENAR AS OPÇÕES DE ESTADO CIVIL
        $tpEstadoCivil = implode(",",array_keys(\App\Client::ESTADO_CIVIL));

        // $this->validateData($request); //valida os dados e retorna false se não deu certo, com as mensagens de erro (antes)
        // $data = $request->all(); //pega todos os dados do requeste, respeitando o fillable (antes)

        $data = $this->validateData($request); //o validateData foi modificado para retornar todos os dados já validados

        $data['status'] = $request->has('status'); //método que retorna o valor do campo se existir, ou false se não for setado. Nesse caso o campo Status é boolean então é só utilizar o método, mas o tratamento poderia ser por operador ternário
        $data['tipo_cliente'] = \App\Client::getClientType($request->tipo_cliente); //força a definição do tipo de cliente, conforme método criado exclusivamente para esse fim

        \App\Client::create($data);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = \App\Client::findOrFail($id);
        return view('admin.clients.show', compact('client'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = \App\Client::findOrFail($id);
        $tipoCliente = $client->tipo_cliente;
        return view('admin.clients.edit', compact('client', 'tipoCliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = \App\Client::findOrFail($id); //busca o cliente com base no ID ou retorna 404 se não localizar
        
        // $this->validateData($request);
        // $data = $request->all();

        $data = $this->validateData($request); //o validateData foi modificado para retornar todos os dados já validados

        $data['status'] = $request->has('status'); //método que retorna o valor do campo se existir, ou false se não for setado. Nesse caso o campo Status é boolean então é só utilizar o método, mas o tratamento poderia ser por operador ternário
        
        $client->fill($data); //aproveita o fillabe do model para preencher todos os campos com os valores do form
        $client->save();
        return redirect()->route('clientes.edit', ['client' => $client->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = \App\Client::findOrFail($id); //busca o cliente com base no ID ou retorna 404 se não localizar
        $client->delete();
        return redirect()->route('clientes.index');
    }



    
    /*### MÉTODO PARA VALIDAR OS DADOS TANTO NO CREATE COMO NO EDIT ###*/
    protected function validateData(Request $request) {

        //VARIÁVEL PARA ARMAZENAR AS OPÇÕES DE ESTADO CIVIL
        $tpEstadoCivil = implode(",",array_keys(\App\Client::ESTADO_CIVIL));

        //DEFINE O TIPO DE CLIENTE, CONFORME MÉTODO CRIADO EXCLUSIVAMENTE PARA ISSO
        $tipoCliente = \App\Client::getClientType($request->tipo_cliente);

        //OBTÉM OS DADOS DO CLIENTE DA ROTA ATUAL PARA IGNORAR NA VALIDAÇÃO
        $clientId = $request->route('cliente');

        //ARMAZENA O TIPO DE DOCUMENTO PARA USO NA VALIDAÇÃO PERSONALIZADA
        $tipoDocumento = $tipoCliente==array_keys(\App\Client::TIPO_CLIENTE)[0] ? 'cpf' : 'cnpj';

        /*#### REGRAS COMUM A TODOS OS CLIENTES ####*/
        $rules["default"] = [
            'documento' => "required|unique:clients,documento,$clientId|valida_cpf_cnpj:$tipoDocumento",
            'celular' => 'required',
            'email' => 'required|email',
        ];
        /*#### REGRAS COMUM A TODOS OS CLIENTES ####*/
        
        
        /*#### REGRAS SOMENTE DO CLIENTE PF ####*/
        $rules[array_keys(\App\Client::TIPO_CLIENTE)[0]] = [
            'nome' => 'required|max:255',
            'dt_nascimento' => 'required|date',
            'estado_civil' => "required|in:$tpEstadoCivil",
            'sexo' => 'required|in:m,f',
            'deficiencia' => 'max:255'
        ];
        /*#### REGRAS SOMENTE DO CLIENTE PF ####*/
        
        
        /*#### REGRAS SOMENTE DO CLIENTE PJ ####*/
        $rules[array_keys(\App\Client::TIPO_CLIENTE)[1]] = [
            'nome_fantasia' => 'required|max:255',
        ];
        /*#### REGRAS SOMENTE DO CLIENTE PJ ####*/

        //Valida somando as regras comuns + regras do $tipoCliente
        return $this->validate($request, $rules["default"] + $rules[$tipoCliente]);
    }
    /*### MÉTODO PARA VALIDAR OS DADOS TANTO NO CREATE COMO NO EDIT ###*/

}
