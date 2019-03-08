    {{csrf_field()}}
    <div class="form-group">
        <label for="nome">Nome</label>
        <input class="form-control" id="nome" name="nome" value="{{$client->nome}}">
    </div>

    <div class="form-group">
        <label for="documento">Documento</label>
        <input class="form-control" id="documento" name="documento" value="{{$client->documento}}">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input class="form-control" id="email" name="email" type="email" value="{{$client->email}}">
    </div>

    <div class="form-group">
        <label for="celular">Telefone</label>
        <input class="form-control" id="celular" name="celular" value="{{$client->celular}}">
    </div>

    <div class="form-group">
        <label for="estado_civil">Estado Civil</label>
        <select class="form-control" name="estado_civil" id="estado_civil" value="{{$client->estado_civil}}">
            <option value="" {{$client->estado_civil == '' ? 'selected="selected"' : ''}}>Selecione o estado civil</option>
            <option value="1" {{$client->estado_civil == '1' ? 'selected="selected"' : ''}}>Solteiro</option>
            <option value="2" {{$client->estado_civil == '2' ? 'selected="selected"' : ''}}>Casado</option>
            <option value="3" {{$client->estado_civil == '3' ? 'selected="selected"' : ''}}>Divorciado
            </option>
        </select>
    </div>

    <div class="form-group">
        <label for="dt_nascimento">Data Nasc.</label>
        <input class="form-control" id="dt_nascimento" name="dt_nascimento" type="date" value="{{$client->dt_nascimento}}">
    </div>


    <div class="radio">
        <label><input type="radio" name="sexo" value="m" {{$client->sexo == 'm' ? 'checked="checked"' : ''}} > Masculino</label>
    </div>

    <div class="radio">
        <label><input type="radio" name="sexo" value="f" {{$client->sexo == 'f' ? 'checked="checked"' : ''}} > Feminino</label>
    </div>

    <div class="form-group">
        <label for="deficiencia">Deficiência Física</label>
        <input class="form-control" id="deficiencia" name="deficiencia" value="{{$client->deficiencia}}">
    </div>
    <div class="checkbox">
        <label><input id="status" name="status" type="checkbox" value="1" {{$client->status == true ? 'checked="checked"' : ''}}> Ativo</label>
    </div>