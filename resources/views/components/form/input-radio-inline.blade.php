<div class="form-check form-check-inline">
    <input class="form-check-input"
           type="radio"
           name="{{ $name }}"
           id="{{ $id }}"
           value="{{ $value }}"
           @if($checked || old($name, $checked) === $value) checked @endif
    >
    <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
</div>
