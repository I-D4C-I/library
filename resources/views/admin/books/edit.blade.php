@extends('layouts.main')


@section('page.title')
    Изменение книги
@endsection

@section('main.content')
@include('includes.admin-header')
    <x-title>
        Изменить книгу

        <x-slot name='link'>
            <a href="{{ route('admin.books.show', $book->id) }}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-book.admin-form action="{{ route('admin.books.update', $book->id) }}"
        method='put'
        :book='$book'
        :types='$types'
        :styles='$styles'
        :authors='$authors'>

        <x-button type='submit'>
            Сохранить
        </x-button>

    </x-book.form>
@endsection
