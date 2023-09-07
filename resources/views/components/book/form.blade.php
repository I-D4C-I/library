@props(['book' => null, 'types' => null, 'styles' => null])



<x-form {{ $attributes }}>

    <x-form-item>
        <x-label>
            Название книги
        </x-label>
        <x-input name="title" value="{{ $book->title ?? '' }}" />
    </x-form-item>

    <x-label>
        Жанр
    </x-label>

    <select class="form-control mb-3" name="styles_id[]" size="5" multiple>
        @if (empty(!$styles))
            @foreach ($styles as $style)
                <option value={{ $style->id }}
                    @isset($book)
                        @foreach ($book->getStyles as $bookStyle)
                            {{ $style->id == $bookStyle->id ? 'selected' : '' }}
                        @endforeach
                    @endisset>

                    {{ $style->title }}

                </option>
            @endforeach
        @else
            <option value="null">Нет доступных жанров</option>
        @endif
    </select>

    <x-form-item>
        <x-label>
            Тип издания
        </x-label>
        <select class="form-control mb-3" name="type_id" id="type_id">
            @if (!empty($types))
                @foreach ($types as $type_key => $type_value)
                    <option value={{ $type_key }}
                        @isset($book->type)
                        {{ $book->type == $type_value ? 'selected' : '' }}
                        @endisset>

                        {{ $type_value }}

                    </option>
                @endforeach
            @else
                <option value="null" selected>
                    Нет доступных типов
                </option>
            @endif
        </select>

    </x-form-item>

    {{ $slot }}

</x-form>
