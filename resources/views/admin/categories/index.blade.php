@extends('layouts.admin')

@section('title')
    Все категории
@endsection

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('a_category.create') }}" class="btn btn-primary mb-4">Создать категорию</a>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Адрес</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Квалификаций</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Category::all() as $category)
                    <tr class="bg-white">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->categoryTypes->count() }}</td>
                        <td><a href="{{ route('a_category.show', $category->id) }}">Редактировать</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
