@php($id = Str::uuid())

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="{{$id}}"
        {{ $attributes->merge([
            'value' => 0,
            'onChange' => ''
        ]) }}>
    <label class="form-check-label" for="{{$id}}">
        {{ $slot }}
    </label>
</div>
