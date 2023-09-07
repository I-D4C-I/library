@props(['style' => null])


<x-form {{$attributes}}>

    <x-form-item>
        <x-label>
            Название жанра
        </x-label>
        <x-input name="title" value="{{ $style->title ?? '' }}" />
    </x-form-item>

    {{ $slot }}

</x-form>
