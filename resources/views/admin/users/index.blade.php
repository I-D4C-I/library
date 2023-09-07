@extends('layouts.main')

@section('page.title')
    Страница администратора
@endsection

@section('main.content')
    @include('includes.admin-header')

    <div class="d-flex justify-content-between mb-2">
        <div>
            <x-form action="{{ route('admin.users.index') }}">
                <button type="submit" name='order_id' value="{{ request('order_id') == 'desc' ? 'asc' : 'desc' }}"
                    class="btn btn-outline-primary btn-sm">
                    Порядок
                </button>
            </x-form>
        </div>
        <div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Создать пользователя</a>
        </div>
    </div>
    <table class="table table-hover table-bordered table-sm caption-top">
        <thead class="text-center">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Books</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        @foreach ($books as $book)
                            @if ($book['user_id'] == $user->id)
                                {{ $book['books'] }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $user->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="m-0">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="btn btn-outline-primary btn-sm me-1">Изменить</a>
                            </div>
                            <div class="m-0">
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <x-button type='submit' class="btn btn-outline-primary btn-sm">
                                        Удалить
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!empty($users))
        <div>
            {{ $users->withQueryString()->links() }}
        </div>
    @endif
@endsection
