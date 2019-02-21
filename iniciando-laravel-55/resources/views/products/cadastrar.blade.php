<html>
    <body>
        <h1>Controller Cadastrar</h1>
        <br>Var1: {{ $var1 }}
        <hr>
        @if(count($array1)>0)
            @foreach($array1 as $key => $value)
                <br>{{$loop->index}} - {{$key." => ".$value }}
            @endforeach
        @endif
    </body>
</html>