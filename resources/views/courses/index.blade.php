@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <h4>Курсы</h4>

            <p class="mb-0">Каталог курсов повышения квалификации и профессиональной переподготовки и обучения.</p>
            <p>Дипломы и Удостоверения от Института РОПКИП признаются аттестационными комиссиями во всех регионах РФ, потому что соответствуют всем установленным Министерством образования и науки РФ требованиям. (Согласно № 273-ФЗ «Об образовании в Российской Федерации» ред. от 26.07.2019)</p>

            <div class="search">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="form-group mb-2">
                            <label for="type1">
                                <input type="radio" name="type" class="form-check-input bg-gradient" id="type1" value="%" checked="checked">
                                Все курсы
                            </label>
                        </div>
                        <div class="form-group mb-2">
                            <label for="type2">
                                <input type="radio" name="type" class="form-check-input bg-gradient" value="repair" id="type2">
                                Программы профессиональной переподготовки
                            </label>
                        </div>
                        <div class="form-group mb-2">
                            <label for="type3">
                                <input type="radio" name="type" class="form-check-input bg-gradient" value="up" id="type3">
                                Программы повышения квалификации
                            </label>
                        </div>
                        <div class="form-group mb-2">
                            <label for="type4">
                                <input type="radio" name="type" class="form-check-input bg-gradient" value="teach" id="type4">
                                Основные программы профессионального обучения
                            </label>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="form-group mb-2">
                            <label for="">Направления</label>
                            <select name="category" id="categories" class="form-control w-100">
                                <option value="%">Все направления</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Квалификация</label>
                            <select name="category-type" id="category-types" class="form-control w-100">
                                <option value="%">Все квалификации</option>
                                @foreach($categories->first()->categoryTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <input type="text" class="form-control" name="search" value="" placeholder="Поиск по курсам">
                    </div>
                    <div class="col-md-4 offset-8 mt-2 mb-4">
                        <button class="btn btn-primary w-100">Поиск</button>
                    </div>
                </div>
            </div>

            <div class="row" id="couse">
                @foreach($courses as $course)
                    <div class="col-md-12 mb-xl-1 mt-xl-4">
                        <div class="row">
                            <div class="col-xl-2">
                                <img src="https://ropkip.ru/content/images/svPOmini.jpg" alt="">
                            </div>
                            <div class="col-xl-5">
                                <a href="{{ route('courses.show', $course->id ) }}">{{ $course->title }}</a>
                            </div>
                            <div class="col-xl-2">
                                <p><b>120</b> часов - <b>{{ $course->price * 120 }}</b> руб.</p>
                                <p><b>330</b> часов - <b>{{ $course->price * 330 }}</b> руб.</p>
                            </div>
                            <div class="col-xl-3">
                                <a class="btn btn-primary d-xl-block" href="{{ route('get-course', $course->id) }}">
                                    Регистрация
                                </a>
                                <a class="btn btn-light d-xl-block mt-xl-2" href="{{ route('u_courses.show', $course->id) }}">
                                    О программе
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
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

                    $('#category-types').append('<option value="%">Все квалификации</option>')

                    for (let item of data) {
                        $('#category-types').append('<option value="' + item.id + '">' + item.title + '</option>')
                    }
                }
            );
        });
    });
</script>
@endpush
