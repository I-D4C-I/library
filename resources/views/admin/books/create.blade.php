@extends('layouts.main')


@section('page.title')
    Создание книги
@endsection

@section('main.content')
@include('includes.admin-header')
    <x-title>
        Создать книгу

        <x-slot name='link'>
            <a href="{{ route('admin.books.index')}}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-book.admin-form action="{{ route('admin.books.store') }}"
        method='post'
        :types='$types'
        :styles='$styles'
        :authors='$authors'>

        <x-button type='submit'>
            Создать книгу
        </x-button>

    </x-book.form>
@endsection
