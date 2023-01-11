@extends('layouts.admin')

@section('title')
    Создание нового курса
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <b class="fs-5">Информация</b>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('courses.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="group mb-3">
                                    <label for="">Категория курса</label>
                                    <select name="category" id="categories" class="form-control select2">
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{ route('a_category.create') }}" class="d-block mt-2" target="_blank">Создать новую категорию</a>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="group mb-3">
                                    <label for="">Квалификация</label>
                                    <select name="category_type" id="category-types" class="form-control select2">
                                        @foreach(\App\Models\Category::first()->categoryTypes as $categoryType)
                                            <option value="{{ $categoryType->id }}">{{ $categoryType->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="group mb-3">
                            <label for="">Тип курса</label>
                            <select name="type" id="" class="form-control select2">
                                <option value="retraining">Программы профессиональной переподготовки</option>
                                <option value="up">Программы повышения квалификации</option>
                                <option value="teach">Основные программы профессионального обучения</option>
                            </select>
                        </div>
                        <div class="group mb-3">
                            <label for="">Название курса</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="group mb-3">
                            <label for="">Описание курса</label>
                            <textarea type="text" name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="group mb-3">
                            <label for="">Цена за час обучения (для цены по умолчанию)</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="group mb-3">
                            <label for="">Часов обучения в день</label>
                            <input type="text" name="hours_per_day" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">Создать курс</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(window).on('load', function () {
            console.log(1);
            $('#categories').on('input', function () {
                $.post(
                    '/api/category/types',
                    {
                        id: $('#categories').val()
                    },
                    function (data) {
                        $('#category-types *').remove();
                        data = JSON.parse(data);

                        for (let item of data) {
                            $('#category-types').append('<option value="' + item.id + '">' + item.title + '</option>')
                        }
                    }
                );
            });
        });
    </script>
@endpush
