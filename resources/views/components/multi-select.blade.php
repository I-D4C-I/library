@props(['options' => null])

<select {{$attributes}} class="form-control mb-3" size="3" multiple>
    @if (empty(!$options))
        @foreach ($options as $option)
            <option value={{ $option->id }}> {{ $option->id }} </option>
        @endforeach
    @else
        <option value="null">Нет доступных жанров</option>
    @endif
</select>
