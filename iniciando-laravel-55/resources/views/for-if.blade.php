<html>
    <body>
        <h1>FOR IF no Blade</h1>
        @if($var1 > 100)
        <br>Var1: {{ $var1 }}
        @endif
        <hr>
        @if($var1 < 20)
            @for($i=0; $i < $var1; $i++)
                <br>i: {{ $i }}
            @endfor
        @endif
        <hr>
        @if($var1 < 20)
            @php
                $x = 0;
            @endphp
            @while($x < $var1)
                <br>x: {{ $x }}
                @php
                    $x++
                @endphp
            @endwhile
        @endif
        <hr>
        @if(count($array1)>0)
            @foreach($array1 as $key => $value)
                <br>{{$loop->index}} - {{$key." => ".$value }}
            @endforeach
        @endif
        <hr>
        @forelse($array1 as $key => $value)
            <br>{{$loop->index}} - {{$key." => ".$value }}
        @empty
            <br><strong>Sem registros</strong>
        @endforelse

    </body>
</html>