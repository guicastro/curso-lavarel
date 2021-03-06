@extends('layouts.layout')

@section('content')

    <br />
    <h3>Visualizar Cliente</h3>
    <br/>
    <a class="btn btn-secondary" href="{{ route('clientes.index')}}">Listar clientes</a>
    <a class="btn btn-primary" href="{{ route('clientes.edit',['client' => $client->id]) }}">Editar</a>
    <a class="btn btn-danger" href="{{ route('clientes.destroy',['client' => $client->id]) }}" onclick="event.preventDefault(); if(confirm('Confirma a exclusão do registro')) { document.getElementById('form-delete').submit(); }">Excluir</a>
    <form id="form-delete" name="form-delete" method="post" action="{{ route('clientes.destroy',['client' => $client->id]) }}" style="display:none">
        {{csrf_field()}}
        {{ method_field('DELETE')}} <!-- Hack para o Laravel entender que o método do de enviar o form é PUT -->
    </form>
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$client->id}}</td>
        </tr>
        <tr>
            <th scope="row">Tipo de Cliente</th>
            <td>{{ \App\Client::TIPO_CLIENTE[$client->tipo_cliente] }}</td>
        </tr>
        <tr>
            <th scope="row">{{ $client->tipo_cliente == array_keys(\App\Client::TIPO_CLIENTE)[0] ? 'Nome' : 'Nome Fantasia'}}</th>
            <td>{{ $client->tipo_cliente == array_keys(\App\Client::TIPO_CLIENTE)[0] ? $client->nome : $client->nome_fantasia}}</td>
        </tr>
        <tr>
            <th scope="row">Documento</th>
            <td>{{$client->documento}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{$client->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{$client->celular}}</td>
        </tr>

        @if($client->tipo_cliente == array_keys(\App\Client::TIPO_CLIENTE)[0])
        <tr>
            <th scope="row">Estado Civil</th>
            <td>{{ \App\Client::ESTADO_CIVIL[$client->estado_civil]}}</td>
        </tr>
        <tr>
            <th scope="row">Data Nasc.</th>
            <td>{{$client->dt_nascimento}}</td>
        </tr>
        <tr>
            <th scope="row">Sexo</th>
            <td>{{ \App\Client::SEXO[$client->sexo]}}</td>
        </tr>
        <tr>
            <th scope="row">Deficiência Física</th>
            <td>{{$client->deficiencia}}</td>
        </tr>
        @endif

        <tr>
            <th scope="row">Status</th>
            <td>{{$client->status?'Ativo': 'Suspenso'}}</td>
        </tr>
        </tbody>
    </table>
@endsection