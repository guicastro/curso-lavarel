<html>
    <body>
        <a href="/admin/produtos/listar">Listar Produtos</a> | <a href="/admin/produtos/cadastrar">Novo Produto</a>
        <h1>Editar Produto</h1>
            <form method="post" action="/admin/produtos/{{$product->id}}/alterar">
                <label for="name">Nome: </label><input type="text" name="name" id="name" value="{{ $product->name }}" />
                <br><label for="name">Descrição: </label><textarea name="description" id="description">{{ $product->description }}</textarea>
                <br><button type="submit">Alterar</button>
                {!! csrf_field() !!}
            </form>
    </body>
</html>