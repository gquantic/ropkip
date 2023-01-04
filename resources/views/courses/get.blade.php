@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <h4>{{ $course->title }}</h4>
                    <form action="{{ route('courses.store') }}" method="post" class="mt-3">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <input type="text" value="{{ $course->id }}" name="course" readonly hidden>

                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Полные ФИО обучаемого: *</label>
                                    <input type="text" class="form-control" name="name" placeholder="">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Укажите ваш Е-mail или номер телефона для отправки кассового чека.</label>
                                    <input type="text" name="email" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Продолжительность курса (часов)</label>
                                    <select name="course_plan" id="" class="form-select">
                                        @foreach($course->coursePlans as $plan)
                                            <option value="{{ $plan->id }}">
                                                {{ $plan->courseMaterials->sum('duration') . " час. - " .
                                                    $plan->courseMaterials->sum('duration') * $course->price . " руб."}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-1">Адрес доставки </label>
                                    <input type="text" name="address" class="form-control" placeholder="655000, г.Красноярск, ул.Пушкина, д.192 кв 66">
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <b>Укажите данные для системы ФИС ФРДО.</b>
                                <div class="form-group mb-2 mt-1">
                                    <label for="" class="mb-1">Дата вашего рождения: *</label>
                                    <input type="date" name="birthdate" class="form-control" placeholder="">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Пол</label>
                                    <select name="gender" id="" class="form-select">
                                        <option value="Мужской">Мужской</option>
                                        <option value="Женский">Женский</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Снилс (11 чисел)</label>
                                    <input type="text" name="snils" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-1">Уровень образования</label>
                                    <select name="education_level" id="" class="form-select">
                                        <option value="Основное общее 5-9 классы">Основное общее 5-9 классы</option>
                                        <option value="Среднее профессиональное образование">Среднее профессиональное образование</option>
                                        <option value="Высшее образование">Высшее образование</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="agree" class="p-2 mt-3"><input type="checkbox" name="agree" class="form-check-input p-2" id="agree">
                            <p style="font-size: 16px;line-height: 25px;display: inline;margin-left: 5px;">
                                Нажимая на кнопку, Вы даете согласие на обработку своих
                            персональных данных и соглашаетесь с нашим
                            <a href="">Договором публичной оферты и Политикой конфиденциальности</a>
                            </p>
                        </label>
                        <label for="installment" class="p-2"><input type="checkbox" name="installment" class="form-check-input p-2" id="installment">
                            <p style="font-size: 16px;line-height: 29px;display: inline;margin-left: 5px;margin-top: 15px;">
                                Оплата в рассрочку 10%. Остаток необходимо оплатить в конце обучения.
                            </p>
                        </label>
                        <div class="col-12">
                            <button type="submit" id="by_course" class="btn btn-primary w-100 p-2 fs-5 mt-2" disabled>
                                Оформить <!--small>(К оплате: <b id="total_price">1222</b> руб.)</small-->
                            </button>
                            <p class="text-danger mt-1" id="agree_danger"
                               style="transition: .2s ease;">Необходимо согласиться с условиями выше (пункт 1).</p>
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
            $('[name="course_plan"]').on('change', function () {
                getCourseInfo();

                setTimeout(function () {
                    var price = $('#full_price').html();
                }, 200);
            });
        });

        $(window).on('load', function () {
            $('#agree').click(function () {
                if ($('#agree').is(':checked')) {
                    $('#by_course').removeAttr('disabled');
                    $('#agree_danger').css("opacity", "0");
                } else {
                    $('#by_course').attr('disabled', 'true');
                    $('#agree_danger').css("opacity", "1");
                }
            });

            getCourseInfo();

            setTimeout(function () {
                var price = $('#full_price').html();

                $('#installment').click(function () {
                    console.log($('#installment').is(':checked'));
                    if ($('#installment').is(':checked')) {
                        console.log('checked');
                        $('#total_price').html(price * 0.1);
                    } else {
                        console.log('unchecked');
                        $('#total_price').html(price);
                    }
                });
            }, 500);

        });

        function getCourseInfo () {
            $.get(
                '{{ route('api.get-info') }}',
                {
                    id: {{ $course->id }},
                    course_plan: $('[name="course_plan"]').val()
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
