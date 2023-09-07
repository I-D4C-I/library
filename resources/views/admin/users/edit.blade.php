@extends('layouts.main')


@section('page.title')
    Изменение пользователя
@endsection

@section('main.content')
    @include('includes.admin-header')
    <x-title>
        Изменить пользователя

        <x-slot name='link'>
            <a href="{{ route('admin.users.index') }}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-user.form action="{{ route('admin.users.update', $user->id) }}"
    method='put'
    :user='$user'
    >
        <x-button type='submit'>
            Сохранить
        </x-button>
    </x-user.form>
@endsection
