<div class="form-floating mb-3 text-body">
    <select class="form-select"
            id="{{ $id }}"
            name="{{ $name }}"
            aria-label="Floating label select example"
    >
        <option selected>Tria una opció</option>
        @foreach($options as $key => $option)
            <option value="{{ $option->id }}" @if($option->id == old($name, $selected)) selected @endif>{{ $option->name }}</option>
        @endforeach
    </select>
    <label for="{{ $id }}">{{ $label }}</label>
    @error($name)<div class="alert alert-danger">{{ $message }}</div>@enderror
</div>
