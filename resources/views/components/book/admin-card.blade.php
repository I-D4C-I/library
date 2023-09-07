<x-card>
    <x-card-body>
        <h5 class="card-title text-capitalize">
            <a href="{{ route('admin.books.show', $book->id) }}">
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
        <p class="card-text mb-0">
            Дата добавления:
            {{ $book->created_at->format('d.m.Y') }}
        </p>
        <div class="container text-center p-0">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <a href="{{ route('admin.books.edit', $book->id) }}" class="card-link">Изменить</a>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <x-button type='submit' class="btn btn-link">
                            Удалить
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </x-card-body>
</x-card>
