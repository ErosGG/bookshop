<div class="form-check form-switch">
    <input class="form-check-input"
           type="checkbox"
           role="switch"
           id="{{ $id }}"
           name="{{ $name }}"
           value="true"
           @if($checked || old($name, $checked) === 'true') checked @endif
    >
    <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
</div>
