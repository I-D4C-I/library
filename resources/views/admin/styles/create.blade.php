@extends('layouts.main')


@section('page.title')
    Создание Жанра
@endsection

@section('main.content')
    @include('includes.admin-header')
    <x-title>
        Создать Жанр

        <x-slot name='link'>
            <a href="{{ route('admin.styles.index') }}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-style.form action="{{ route('admin.styles.store') }}" method='post'>
        <x-button type='submit'>
            Создать Жанр
        </x-button>
    </x-style.form>
@endsection
