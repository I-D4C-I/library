@extends('layouts.main')

@section('page.title')
    Главная страница
@endsection


@section('main.content')

    <x-title>
        Главная страница
    </x-title>

    @include('home.filter')

    @if (empty($books))
        Нет ни одной книги.
    @else
        <div class="row">
            @foreach ($books as $book)
                <div class="col-12 col-md-6">
                    <x-book.card :book="$book" />
                </div>
            @endforeach
            <div>
                {{ $books->withQueryString()->links() }}
            </div>
        </div>
    @endif
@endsection
