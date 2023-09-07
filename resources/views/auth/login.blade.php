@extends('layouts.auth')

@section('page.title')
    Страница входа
@endsection


@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                Вход
            </x-card-title>
        </x-card-header>

        <x-card-body>
            <x-form action="{{ route('login') }}" method="POST">
                <x-form-item>
                    <x-label>Email</x-label>
                    <x-input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                    <x-form-item>
                        <x-label>Пароль</x-label>
                        <input type="password" name="password" class="form-control" required autocomplete="current-password">
                    </x-form-item>
                </x-form-item>
                <x-form-item>
                    <x-checkbox name="remember">
                        Запомнить меня
                    </x-checkbox>
                </x-form-item>
                <x-button type='submit'>
                    Войти
                </x-button>
            </x-form>
        </x-card-body>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
            </div>
        </div>
    </x-card>
@endsection
