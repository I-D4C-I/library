

<x-card>
    <x-card-body>
        <h5 class="card-title text-capitalize mb-0 ms-2">
            <a href="{{ route('admin.books.show', $book->id) }}">
                {{ $book->title }}
            </a>
        </h5>
        <div class="small ms-2">
            <x-styles :book='$book'></x-styles>
        </div>
        <p class="card-text small mb-0 ms-2">
            {{ $book->type }}
        </p>
        <div class="container p-0" >
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
