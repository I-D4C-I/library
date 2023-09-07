@extends('layouts.main')


@section('page.title')
    Изменение Жанра
@endsection

@section('main.content')
    @include('includes.admin-header')
    <x-title>
        Изменить Жанр

        <x-slot name='link'>
            <a href="{{ route('admin.styles.index') }}">
                Назад
            </a>
        </x-slot>
    </x-title>

    <x-style.form action="{{ route('admin.styles.update', $style->id) }}"
    method='put'
    :style='$style'
    >
        <x-button type='submit'>
            Сохранить
        </x-button>
    </x-style.form>
@endsection
