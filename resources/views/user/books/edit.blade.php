@extends('layouts.main')


@section('page.title')
    Мои книги
@endsection

@section('main.content')
    <x-title>
        Изменить книгу

        <x-slot name='link'>
            <a href="{{ route('user.books.show', $book->id) }}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-book.form action="{{ route('user.books.update', $book->id) }}"
        method='put'
        :book='$book'
        :types='$types'
        :styles='$styles'>

        <x-button type='submit'>
            Сохранить
        </x-button>

    </x-book.form>
@endsection
