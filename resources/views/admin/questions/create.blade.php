@extends('layouts.admin')

@section('title')
    Создание вопроса
@endsection

@section('content')
    <form action="{{ route('questions.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5 class="title fw-bold">
                    Данные
                </h5>

                <input type="text" name="test_id" value="{{ $_GET['testId'] }}" hidden>

                <div class="form-group mb-3 mt-3">
                    <label for="">Заголовок вопроса</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Формат вопроса</label>
                    <select name="question_format" class="form-control select2" id="">
                        <option value="radio">Выбор только 1 варианта ответа</option>
                        <option value="checkbox">Выбор нескольких вариантов ответа</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body" id="answers">
                <h5 class="title fw-bold">
                    Варианты ответа
                </h5>

                <hr>
                <div class="form-group mb-3 mt-3">
                    <label for=""><span class="answer_count"></span> Текст варианта ответа</label>
                    <input type="text" name="answers[]" class="form-control">
                    <hr>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for=""><span class="answer_count"></span> Текст варианта ответа</label>
                    <input type="text" name="answers[]" class="form-control">
                    <hr>
                </div>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary waves-effect" id="add_answer"><i class="mdi mdi-plus"></i> Добавить вариант</button>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="title fw-bold">
                    Правильные варианты ответа или вариант
                </h5>

                <div class="form-group mb-3 mt-3">
                    <label for="">Впишите вариант или варианты через запятую (читать инструкцию ниже)</label>
                    <input type="text" name="correct" class="form-control">
                </div>

                <div class="alert alert-warning">
                    Впишите номер правильного варианта. <br>
                    Если вариантов несколько, то впишите номера через запятую.
                    <b>Пробелы не ставить!</b> <br>
                    Пример: <b>2,4,5</b>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="title fw-bold">
                    Максимальный балл
                </h5>

                <div class="form-group mb-3 mt-3">
                    <input type="text" name="max_score" class="form-control">
                </div>

                <div class="alert alert-warning">
                    (Кол-во ответов делится на максимальный балл)
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-light waves-effect">Создать вопрос</button>

            </div>
        </div>
    </form>

    <style>
        .answer_count {
            color: #0a53be;
            font-size: 17px;
            background: rgba(0,0,0,.03);
            padding: 5px 10px;
            border-radius: 7px;
        }
    </style>
@endsection

@push('scripts')
    <script>
        $(window).on('load', function () {
            setNumeration();
        });

        let newQuestion = '<div class="form-group mb-3 mt-3 it_answer">' +
            '<label for=""><span class="answer_count"></span> Текст варианта ответа</label>' +
            '<input type="text" name="answers[]" class="form-control mb-2">' +
            '<button type="button" class="btn btn-danger waves-effect" onclick="removeAnswer(this)">Удалить вариант ответа</button>' +
            '<hr>' +
            '</div>';

        $('#add_answer').on('click', function () {
            $('#answers').append(newQuestion);
            setNumeration();
        });

        function removeAnswer(element) {
            console.log(element);
            $(element).parent('.it_answer').remove();
            setNumeration();
        }

        function setNumeration() {
            $.each($('.answer_count'), function (index, value) {
                console.log(index, value);
                $(value).html(index + 1);
            });
        }
    </script>
@endpush
