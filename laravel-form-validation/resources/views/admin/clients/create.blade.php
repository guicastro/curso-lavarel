@extends('layouts.layout')

@section('content')

    <br />
    <h3>Novo Cliente</h3>
    <br/><br/>
    <form method="post" action="/admin/clientes">
        {{csrf_field()}}
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" id="nome" name="nome" value="">
        </div>

        <div class="form-group">
            <label for="documento">Documento</label>
            <input class="form-control" id="documento" name="documento" value="">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" id="email" name="email" type="email" value="">
        </div>

        <div class="form-group">
            <label for="celular">Telefone</label>
            <input class="form-control" id="celular" name="celular" value="">
        </div>

        <div class="form-group">
            <label for="estado_civil">Estado Civil</label>
            <select class="form-control" name="estado_civil" id="estado_civil" value="">
                <option value="">Selecione o estado civil</option>
                <option value="1">Solteiro</option>
                <option value="2">Casado</option>
                <option value="3">Divorciado
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="dt_nascimento">Data Nasc.</label>
            <input class="form-control" id="dt_nascimento" name="dt_nascimento" type="date" value="">
        </div>


        <div class="radio">
            <label>
                <input type="radio" name="sexo" value="m"> Masculino
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="sexo" value="f"> Feminino
            </label>
        </div>

        <div class="form-group">
            <label for="deficiencia">Deficiência Física</label>
            <input class="form-control" id="deficiencia" name="deficiencia"
                    value="">
        </div>
        <div class="checkbox">
            <label>
                <input id="status" name="status" type="checkbox" value="1"> Ativo</label>
        </div>
        <button type="submit" class='btn btn-primary'>Enviar</button>
    </form>
@endsection