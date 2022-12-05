@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <h4>{{ $course->title }}</h4>
                    <form action="" class="mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Полные ФИО обучаемого: *</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Укажите ваш Е-mail или номер телефона для отправки кассового чека.</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Продолжительность курса</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-1">Адрес доставки </label>
                                    <input type="text" class="form-control" placeholder="655000, г.Красноярск, ул.Пушкина, д.192 кв 66">
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <b>Укажите данные для системы ФИС ФРДО.</b>
                                <div class="form-group mb-2 mt-1">
                                    <label for="" class="mb-1">Дата вашего рождения: *</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Пол</label>
                                    <select name="" id="" class="form-select">
                                        <option value="">Мужской</option>
                                        <option value="">Женский</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Продолжительность курса</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-1">Адрес доставки </label>
                                    <input type="text" class="form-control" placeholder="655000, г.Красноярск, ул.Пушкина, д.192 кв 66">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4">
                    <img src="https://ropkip.ru/content/images/svpo.jpg" class="w-100" alt="">

                    <p class="mt-3 mb-0"><b>{{ $course->title }}</b></p>
                    <p class="mb-0">Количество часов: <b>330</b> акад. часов</p>
                    <p class="mb-0">Срок обучения: <b>330</b> акад. часов</p>
                    <p class="mb-0">Полная стоимость обучения: <b>330</b> руб.</p>
                    <p class="mb-0">Ориентировочная дата окончания обучения: <b>28.01.2023</b>.</p>

                    <div class="alert alert-warning mt-3">
                        <p class="mt-0 mb-2"><b>Важно!</b></p>
                        <p class="mb-0">К освоению основных программ профессионального обучения допускаются лица различного возраста, в том числе не имеющие основного общего или среднего общего образования, включая лиц с ограниченными возможностями здоровья.</p>
                    </div>

                    <a href="">Инструкция по регистрации и обучению на сайте</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(window).on('load', function () {

        });
    </script>
@endpush
