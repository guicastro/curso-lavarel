<html>
    <body>
        <h1>Blade</h1>
        <br>Var1: {{ $var1 }}
        <br>Var2: {{ $var2 }}
        <br>Var3: {{ $var3==2 ? "dois" : "não é dois" }}
        <br>Var4: {{ $var4??"não foi setado" }}
    </body>
</html>