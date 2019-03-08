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
    public function create()
    {
        return view('admin.clients.create', ['client' => new \App\Client()]); //foi passado na View de Create um model Client vazio apenas para que funcione a inclusão do formulário, para aproveitar o código e não dar erro
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

        $this->validateData($request);
        $data = $request->all();
        $data['status'] = $request->has('status'); //método que retorna o valor do campo se existir, ou false se não for setado. Nesse caso o campo Status é boolean então é só utilizar o método, mas o tratamento poderia ser por operador ternário
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
        return view('admin.clients.edit', compact('client'));
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
        $this->validateData($request);
        $data = $request->all();
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

        $this->validate($request, [
            'nome' => 'required|max:255',
            'documento' => 'required',
            'email' => 'required|email',
            'celular' => 'required',
            'dt_nascimento' => 'required|date',
            'estado_civil' => "required|in:$tpEstadoCivil",
            'sexo' => 'required|in:m,f',
            'deficiencia' => 'max:255'
        ]);
    }
    /*### MÉTODO PARA VALIDAR OS DADOS TANTO NO CREATE COMO NO EDIT ###*/

}
