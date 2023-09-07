@extends('layouts.main')

@section('page.title')
    {{ $book->title }}
@endsection

@section('main.content')
    <x-title>

        {{ $book->title }}

        <x-slot name="link">
            <a href="{{ route('home') }}">Назад</a>
        </x-slot>

    </x-title>

    <div class="mb-4">
        <p>
            {{ $book->name }}
        </p>
        <x-styles :book='$book'/>
        <p>
            {{ $book->type }}
        </p>
    </div>
@endsection
