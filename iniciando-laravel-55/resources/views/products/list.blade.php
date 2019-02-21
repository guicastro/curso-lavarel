<html>
    <body>
        <a href="/admin/produtos/cadastrar">Novo Produto</a>
        <h1>Listar Produtos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="./{{ $product->id }}/editar">Alterar</a> | <a href="./{{ $product->id }}/excluir" onclick="event.preventDefault(); if(confirm('Deseja excluir este registro?')) { window.location.href= './{{ $product->id }}/excluir' }">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>