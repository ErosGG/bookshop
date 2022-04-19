<form method="post" action="{{ $href }}" enctype="{{ $enctype }}">
    @csrf
    @method($method)
    <button class="btn btn-link text-light" type="submit"><i class="bi bi-trash"></i></button>
</form>
