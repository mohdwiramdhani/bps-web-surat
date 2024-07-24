<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea class="form-control border border-2 p-2 @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" rows="3">{{ old($name, $value) }}</textarea>
    <span class="error invalid-feedback">{{ $errors->first($name) }}</span>
</div>
