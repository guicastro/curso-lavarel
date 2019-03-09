@extends('layouts.layout')

@section('content')
    <br />
    <h3>Novo Cliente</h3>
    <h5>{{ \App\Client::TIPO_CLIENTE[$tipoCliente] }}</h5>
    <br/>
    <a class="btn btn-secondary" href="{{ route('clientes.index')}}">Listar clientes</a>
    <br><br>
    <a class="btn btn-info" href="{{ route('clientes.create', ['tipo_cliente' => array_keys(\App\Client::TIPO_CLIENTE)[0]]) }}">Pessoa Física</a> 
    <a class="btn btn-info" href="{{ route('clientes.create', ['tipo_cliente' => array_keys(\App\Client::TIPO_CLIENTE)[1]]) }}">Pessoa Jurídica</a>
    @include('admin.form.errors')
    <br/>
    <form method="post" action="/admin/clientes">
        @include('admin.clients.form')
        <button type="submit" class='btn btn-primary'>Enviar</button>
    </form>
@endsection