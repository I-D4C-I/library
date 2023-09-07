@extends('layouts.main')


@section('page.title')
    Создание пользователя
@endsection

@section('main.content')
    @include('includes.admin-header')
    <x-title>
        Создать пользователя

        <x-slot name='link'>
            <a href="{{ route('admin.users.index') }}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-user.form action="{{ route('admin.users.store') }}" method='post'>
        <x-button type='submit'>
            Создать
        </x-button>
    </x-user.form>
@endsection
