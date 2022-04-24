<div class="form-floating mb-3 text-body">
    <textarea class="form-control @error($name) is-invalid @enderror"
{{--              placeholder="{{ $placeholder }}"--}}
              id="{{ $id }}"
              name="{{ $name }}"
    >{!! old($name, $value) !!}</textarea>
    <label for="{{ $id }}">{{ $label }}</label>
    @error($name)<div class="alert alert-danger">{{ $message }}</div>@enderror
</div>
