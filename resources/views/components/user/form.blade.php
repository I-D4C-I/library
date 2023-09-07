@props(['user' => null])


<x-form {{$attributes}}>

    <x-form-item>
        <x-label>
            Имя пользователя
        </x-label>
        <x-input name="name" value="{{ $user->name ?? '' }}" />
    </x-form-item>

    <x-form-item>
        <x-label>
            Email
        </x-label>
        <x-input name="email" type="email" value="{{ $user->email ?? '' }}" />
    </x-form-item>

    <x-form-item>
        <x-label>
            Пароль
        </x-label>
        <x-input name="password"/>
    </x-form-item>

    {{ $slot }}

</x-form>
