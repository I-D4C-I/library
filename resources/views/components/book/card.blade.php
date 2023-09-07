<x-card>
    <x-card-body>
        <h5 class="card-title text-capitalize">
            <a href="{{ route('books.show', $book->id) }}">
                {{ $book->title }}
            </a>
        </h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">
            {{ $book->name }}
        </h6>
        <x-styles :book='$book'></x-styles>
        <p class="card-text">
            {{ $book->type }}
        </p>
    </x-card-body>
</x-card>
