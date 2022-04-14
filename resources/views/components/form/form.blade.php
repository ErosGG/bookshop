<form method="{{ $method }}" action="{{ $action }}" enctype="{{$enctype}}">
    @if($method !== 'GET') @csrf @endif
    @if($method === 'POST' || $method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    {{ $slot }}
    <div class="d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-primary mt-2 me-1">Acceptar</button>
        <button type="reset" class="btn btn-secondary mt-2 ms-1">Netejar</button>
    </div>
</form>
