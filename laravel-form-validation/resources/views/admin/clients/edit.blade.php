@extends('layouts.layout')

@section('content')

    <br />
    <h3>Editar Cliente</h3>
    <h5>{{ \App\Client::TIPO_CLIENTE[$tipoCliente] }}</h5>
    <br/>
    <a class="btn btn-secondary" href="{{ route('clientes.index')}}">Listar clientes</a>
    @include('admin.form.errors')
    <br/>
    <form method="post" action="{{ route('clientes.update', ['client' => $client->id]) }}">
        {{ method_field('PUT')}} <!-- Hack para o Laravel entender que o método do de enviar o form é PUT -->
        @include('admin.clients.form')
        <button type="submit" class='btn btn-success'>Salvar</button>
    </form>
@endsection