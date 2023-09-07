@extends('layouts.main')


@section('page.title')
    Мои книги
@endsection

@section('main.content')

    <x-title>
        Мои книги

        <x-slot name="right">
            <x-button-link href="{{route('user.books.create')}}">
                Создать
            </x-button-link>
        </x-slot>
    </x-title>

    @if (empty($books))
        Нет ни одной книги.
    @else
        <div class="row">
            @foreach ($books as $book)
                <div class="col-12 col-md-4">
                    <x-book.user-card :book="$book" />
                </div>
            @endforeach
            <div>
                {{ $books->withQueryString()->links() }}
            </div>
        </div>
    @endif

@endsection
