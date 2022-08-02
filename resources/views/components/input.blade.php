<div class="mb-3">
  @switch($type)
      @case('select')
          
          @break
      @default
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}" value="{{ old($name) ?? $value }}">
        @error($name)
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
        @break
  @endswitch
</div>