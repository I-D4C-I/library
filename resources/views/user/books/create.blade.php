@extends('layouts.main')


@section('page.title')
    Мои книги
@endsection

@section('main.content')
    <x-title>
        Создать книгу

        <x-slot name='link'>
            <a href="{{ route('user.books') }}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-book.form action="{{ route('user.books.store') }}"
        method='post'
        :types='$types'
        :styles='$styles'>

        <x-button type='submit'>
            Создать книгу
        </x-button>

    </x-book.form>
@endsection
