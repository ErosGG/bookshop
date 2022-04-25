<form method="{{ $method == 'get' ? 'get' : 'post' }}" action="{{ $action }}" enctype="{{$enctype}}">
    @if($method != 'get') @csrf @endif
    @if($method == 'post' || $method == 'put' || $method == 'patch')
        @method($method)
    @endif
    {{ $slot }}
    <div class="d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-primary mt-2 me-1">Acceptar</button>
        <button type="reset" class="btn btn-secondary mt-2 ms-1">Restaurar</button>
    </div>
</form>
