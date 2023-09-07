@props(['book' => null, 'types' => null, 'styles' => null, 'authors' => null])



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

    <x-form-item>
        <x-label>
            Автор
        </x-label>
        <select class="form-control mb-3" name="author_id" id="author_id">
            @if (!empty($authors))
                @foreach ($authors as $author)
                    <option value={{ $author->id }}
                        @isset($book)
                        {{ $book->user_id == $author->id ? 'selected' : '' }}
                        @endisset>
                        {{ $author->name }}
                    </option>
                @endforeach
            @else
                <option value="null" selected>
                    Нет доступных авторов
                </option>
            @endif
        </select>

    </x-form-item>

    {{ $slot }}

</x-form>
