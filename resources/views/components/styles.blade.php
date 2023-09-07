
@php
    $styles = $book->getStyles;
@endphp

<p class="mb-1 card-text text-capitalize">
    @foreach ($styles as $style)
        {{ $style->title }},
    @endforeach
</p>
