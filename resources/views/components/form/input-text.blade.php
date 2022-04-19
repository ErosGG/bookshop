<div class="form-floating mb-3 text-body">
    <input type="text"
           class="form-control @error($name) is-invalid @enderror"
           id="{{ $id }}"
           name="{{ $name }}"
           placeholder="{{ $placeholder }}"
           value="{!! old($name, $value) !!}"
    >
    <label for="{{ $id }}">{{ $label }}</label>
    @error($name)<div class="alert alert-danger">{{ $message }}</div>@enderror
</div>
