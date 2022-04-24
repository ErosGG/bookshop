<div class="row mb-3">
    <label class="col-sm-1 col-form-label text-center" for="{{ $id }}">{{ $label }}</label>
    <div class="col-sm-11">
        <input type="file"
               class="form-control @error($name) is-invalid @enderror"
               id="{{ $id }}"
               name="{{ $name }}"
               value="{!! old($name, $value) !!}"
        >
        @error($name)<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
</div>
