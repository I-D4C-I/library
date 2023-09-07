@extends('layouts.auth')

@section('page.title')
    Регистрация
@endsection

@section('auth.content')

<x-card>
    <x-card-header>
        <x-card-title>
            Регистрация
        </x-card-title>
    </x-card-header>

    <x-card-body>
        <x-form action="{{ route('register') }}" method="POST" >
            <x-form-item>
                <x-label>Имя</x-label>
                <x-input name="name" value="{{old('name')}}" required autocomplete="name"/>
            </x-form-item>
            <x-form-item>
                <x-label>Email</x-label>
                <x-input type="email" name="email" value="{{old('email')}}" required autocomplete="email"/>
            </x-form-item>
            <x-form-item>
                <x-label>Пароль</x-label>
                <input type="password" name="password" class="form-control" required autocomplete="new-password">
            </x-form-item>
            <x-form-item>
                <x-label>Подтверждение пароля</x-label>
                <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
            </x-form-item>
            <x-button type='submit'>
                Зарегистрироваться
            </x-button>
        </x-form>
    </x-card-body>
</x-card>
@endsection
