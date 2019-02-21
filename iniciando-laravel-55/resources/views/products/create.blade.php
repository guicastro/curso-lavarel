<html>
    <body>
        <a href="/admin/produtos/listar">Listar Produtos</a>
        <h1>Criar Produto</h1>
            <form method="post" action="/admin/produtos/salvar">
                <label for="name">Nome: </label><input type="text" name="name" id="name" />
                <br><label for="name">Descrição: </label><textarea name="description" id="description"></textarea>
                <br><button type="submit">Criar</button>
                {!! csrf_field() !!}
            </form>
    </body>
</html>