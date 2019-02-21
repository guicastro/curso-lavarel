<?php 
    $csrfToken = csrf_token();
?>

<html>
    <body>
        <h1>Fornecedor</h1>
        <form method="post" action="./cliente/cadastrar">
            Var1: <input type="text" name="var1" value="<?php echo $var1 ?>" />
            <br>Var2: <input type="text" name="var2" value="<?php echo $var2 ?>" />
            <br><button type="submit">Enviar</button>
            <input type="hidden" name="_token" value="<?php echo $csrfToken; ?>" />
        </form>
    </body>
</html>