@extends('layouts.layout')

@section('content')

    <br />
    <h3>Novo Cliente</h3>
    <br/>
    <a class="btn btn-secondary" href="{{ route('clientes.index')}}">Listar clientes</a>
    @include('admin.form.errors')
    <br/>
    <form method="post" action="/admin/clientes">
        @include('admin.clients.form')
        <button type="submit" class='btn btn-primary'>Enviar</button>
    </form>
@endsection