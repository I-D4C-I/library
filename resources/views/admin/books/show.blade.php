@extends('layouts.main')


@section('page.title')
    {{ $book->title }}
@endsection

@section('main.content')

@include('includes.admin-header')

    <x-title>
        {{ $book->title }} :

        {{$book->author}}

        <x-slot name="link">
            <a href="{{ route('admin.books.index') }}">
                Назад
            </a>
        </x-slot>

        <x-slot name="right">
            <div class="mb-3">
                <x-button-link href="{{ route('admin.books.edit', $book->id) }}">
                    Изменить
                </x-button-link>
            </div>
        </x-slot>
    </x-title>

    <div class="mb-5">
        <h4>
            <x-styles :book='$book'/>
        </h4>
        <h4 class="small">
            {{ $book->type }}
        </h4>
    </div>

    <div>
        <form action="{{ route('admin.books.destroy', $book->id)}}" method = "POST">
            @method('DELETE')
            @csrf
            <x-button type='submit'>
                Удалить
            </x-button>
        </form>
    </div>

@endsection
