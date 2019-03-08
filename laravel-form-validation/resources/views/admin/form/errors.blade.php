    @if($errors->all())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $errorMsg)
                <li>{{$errorMsg}}</li>
            @endforeach
        </ul>
    @endif
