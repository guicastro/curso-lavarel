<html>
    <body>
        <h1>Controller {{ $titulo }}</h1>
        <br>Texto: {{ $texto }}
        <hr>
        @if((isset($array1)&&(count($array1)>0)))
            @foreach($array1 as $key => $value)
                <br>{{$loop->index}} - {{$key." => ".$value }}
            @endforeach
        @endif
    </body>
</html>