

<x-form action="{{ route('home') }}">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name='search' value="{{ request('search') }}" placeholder="Поиск"></x-input>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <select class="form-select" name="style">
                <option value="">-Выбор Жанра-</option>
                @if (empty(!$styles))
                    @foreach ($styles as $style)
                        <option value={{ $style->id }} {{$style->id == request('style') ? 'selected' : ''}}>
                            {{ $style->title }}
                        </option>
                    @endforeach
                @else
                    <option value="">Нет доступных жанров</option>
                @endif
            </select>
        </div>
        <div class="col-12 col-md-4">
            <select class="form-select" name="author">
                <option value="">-Выбор Автора-</option>
                @if (empty(!$authors))
                    @foreach ($authors as $author)
                        <option value={{ $author->id }} {{$author->id == request('author') ? 'selected' : ''}}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                @else
                    <option value="">Нет доступных Авторов</option>
                @endif
            </select>
        </div>
        <div class="col-12 col-md-10">

        </div>
        <div class="col-12 col-md-2">
            <div class="mb-3">
                <x-button type='submit'> Применить </x-button>
            </div>
        </div>
    </div>
</x-form>
