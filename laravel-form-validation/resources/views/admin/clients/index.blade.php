@extends('layouts.layout')

@section('content')
    <br />
    <h3>Listagem de clientes</h3>
    <br/><br/>
    <a class="btn btn-secondary" href="{{ route('clientes.create')}}">Criar novo</a>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CNPJ/CPF</th>
            <th>Data Nasc.</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nome }}</td>
                <td>{{ $client->documento }}</td>
                <td>{{ $client->dt_nascimento }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->celular }}</td>
                <td>{{ $client->sexo }}</td>
                <td>
                    <a href="{{route('clientes.edit', ['client' => $client->id]) }}">Editar</a> |
                    <a href="{{route('clientes.show', ['client' => $client->id]) }}">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection