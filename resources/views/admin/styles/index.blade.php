@extends('layouts.main')

@section('page.title')
    Страница администратора
@endsection


@section('main.content')
    @include('includes.admin-header')


    <div class="d-flex justify-content-between mb-2">
        <div>
            <x-form action="{{ route('admin.styles.index') }}">
                <button type="submit" name='order_id' value="{{ request('order_id') == 'desc' ? 'asc' : 'desc' }}"
                    class="btn btn-outline-primary btn-sm">
                    Порядок
                </button>
            </x-form>
        </div>
        <div>
            <a href="{{ route('admin.styles.create') }}" class="btn btn-primary">Создать жанр</a>
        </div>
    </div>
    <table class="table table-hover table-bordered table-sm caption-top">
        <thead class="text-center">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($styles as $style)
                <tr>
                    <th scope="row">{{ $style->id }}</th>
                    <td>{{ $style->title }}</td>
                    <td>{{ $style->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="m-0">
                                <a href="{{ route('admin.styles.edit', $style->id) }}"
                                    class="btn btn-outline-primary btn-sm me-4">Изменить</a>
                            </div>
                            <div class="m-0">
                                <form action="{{ route('admin.styles.destroy', $style->id) }}" method="POST">
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
    @if (!empty($styles))
        <div>
            {{ $styles->withQueryString()->links() }}
        </div>
    @endif
@endsection
