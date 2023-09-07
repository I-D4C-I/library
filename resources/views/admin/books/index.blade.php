@extends('layouts.main')

@section('page.title')
    Страница администратора
@endsection


@section('main.content')

    @include('includes.admin-header')

    @include('admin.user-filter')

    @if (empty($books))
        Нет ни одной книги.
    @else
        <div class="row">
            @foreach ($books as $book)
                <div class="col-12 col-md-4">
                    <x-book.admin-card :book="$book" />
                </div>
            @endforeach
            <div>
                {{ $books->withQueryString()->links() }}
            </div>
        </div>
    @endif

@endsection
