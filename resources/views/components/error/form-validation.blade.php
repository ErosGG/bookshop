@if ($errors->any())
    <div class="alert alert-danger">
        <span>Si us plau, corregiu els errors:</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
