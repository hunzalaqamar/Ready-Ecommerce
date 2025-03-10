<div>
    @if ($label)
        <label for="{{ $name }}" class="form-label">{{ __($label) }} @if ($required) <span class="text-danger">*</span> @endif</label>
    @endif
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name) ?? $value }}" placeholder="{{ __($placeholder) ?? '' }}" @if($onlyNumber) oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" @endif  @if ($required) required @endif @if ($readonly) readonly @endif maxlength="255" @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif @if($notAllowLetter) onkeypress="return [43, 46, 32].includes(event.charCode) || (event.charCode >= 48 && event.charCode <= 57);" @endif>
    @error($name)
        <p class="text text-danger m-0">{{ $message }}</p>
    @enderror
</div>
