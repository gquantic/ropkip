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
                                    <label for="" class="mb-1">Продолжительность курса (часов)</label>
                                    <select name="duration" id="" class="form-select">
                                        <option value="120">120 - {{ $course->price * 120 }} руб.</option>
                                        <option value="330">330 - {{ $course->price * 330 }} руб.</option>
                                    </select>
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
                                    <input type="date" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Пол</label>
                                    <select name="" id="" class="form-select">
                                        <option value="">Мужской</option>
                                        <option value="">Женский</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Снилс (11 чисел)</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-1">Уровень образования</label>
                                    <select name="" id="" class="form-select">
                                        <option value="">Основное общее 5-9 классы</option>
                                        <option value="">Среднее профессиональное образование</option>
                                        <option value="">Высшее образование</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="agree" class="p-2 mt-3"><input type="checkbox" class="form-check-input p-2" id="agree">
                            <p style="font-size: 16px;line-height: 25px;display: inline;margin-left: 5px;">
                                Нажимая на кнопку, Вы даете согласие на обработку своих
                            персональных данных и соглашаетесь с нашим
                            <a href="">Договором публичной оферты и Политикой конфиденциальности</p></a>
                        </label>
                        <label for="loan" class="p-2"><input type="checkbox" class="form-check-input p-2" id="loan">
                            <p style="font-size: 16px;line-height: 29px;display: inline;margin-left: 5px;margin-top: 15px;">
                                Оплата в рассрочку 10%. Остаток необходимо оплатить в конце обучения.
                            </p></a>
                        </label>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 p-2 fs-5 mt-2">
                                Оформить <small>(К оплате: <b>1222</b> руб.)</small>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4">
                    <img src="https://ropkip.ru/content/images/svpo.jpg" class="w-100" alt="">

                    <p class="mt-3 mb-0"><b>{{ $course->title }}</b></p>
                    <p class="mb-0">Количество часов: <b id="duration">Загрузка...</b> акад. часов</p>
                    <p class="mb-0">Срок обучения: <b id="training_duration">Загрузка...</b> акад. часов</p>
                    <p class="mb-0">Полная стоимость обучения: <b id="full_price">Загрузка...</b> руб.</p>
                    <p class="mb-0">Ориентировочная дата окончания обучения: <b id="end_date">Загрузка...</b>.</p>

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
            $('[name="duration"]').on('change', function () {
                getCourseInfo();
            });
        });

        $(window).on('load', function () {
            getCourseInfo();
        });

        function getCourseInfo () {
            $.get(
                '{{ route('api.get-info') }}',
                {
                    id: {{ $course->id }},
                    duration: $('[name="duration"]').val()
                },
                function (data) {
                    console.log(data);
                    $('#duration').html(data.duration);
                    $('#training_duration').html(data.duration);
                    $('#full_price').html(data.full_price);
                    $('#end_date').html(data.end_date);
                }
            );
        }
    </script>
@endpush
