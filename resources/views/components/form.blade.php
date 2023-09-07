@props(['method' => 'get'])

@php($method = strtoupper($method))
@php($is_method = in_array($method, ['GET', 'POST']))

<form {{ $attributes }} method="{{ $is_method ? $method : 'POST' }}">

    @if ($is_method == false)
        @method($method)
    @endif

    @if ($method !== 'GET')
        @csrf
    @endif


    {{ $slot }}

</form>
