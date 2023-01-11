@extends('layouts.admin')

@section('title')
    Редактирование категории
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b class="fs-6">Информация</b>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b class="fs-6">Квалификации</b>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Дата создания</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category->categoryTypes as $categoryType)
                            <tr>
                                <td>{{ $categoryType->id }}</td>
                                <td>{{ $categoryType->title }}</td>
                                <td>{{ $categoryType->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('a_ctype.create', ['categoryId' => $category->id]) }}">Создать квалификацию</a>
                </div>
            </div>
        </div>
    </div>


@endsection
