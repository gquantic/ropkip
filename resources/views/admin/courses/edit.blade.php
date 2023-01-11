@extends('layouts.admin')

@section('title')
    Редактирование курса "{{ $course->title }}"
@endsection

@section('content')
    <a href="{{ route('a_plan.create', ['courseId' => $course->id]) }}" class="btn btn-primary mb-3 waves-effect">Создать новый план</a>
    @foreach($course->coursePlans as $plan)
        <div class="card">
            <div class="card-body">
                <div class="fs-4 fw-bolder">План на {{ $plan->courseMaterials->sum('duration') }} часов</div>
                <a href="">Добавить модуль</a>
                @foreach($plan->planModules as $module)
                    <div class="card">
                        <div class="card-body">
                            <div class="fs-5 mb-2 fw-bold">Модуль {{ $module->title }}</div>
                            @foreach($module->materials as $material)
                                <a href="{{ $material->link }}" class="fs-6 d-block"><i class="mdi mdi-link-variant"></i> {{ $material->title }}</a>
                            @endforeach
                            <a href="" class="fs-6 d-block text-decoration-underline mb-3"><i class="mdi mdi-link-variant-plus"></i> Добавить материал</a>

                            <div class="fs-5 fw-bolder">Тесты модуля:</div>

                            @if ($module->tests->count() == 0)
                                <p class="text-danger fw-bolder mb-0">В модуле нет теста!</p>
                            @endif

                            @foreach($module->tests as $test)
                                <div class="fs-5 mb-2">Тест #{{ $test->id }} {{ $test->title !== '' ? "\"{$test->title}\"" : "" }}</div>
                            @endforeach

                            <a href="{{ route('tests.create', ['moduleId' => $module->id]) }}" class="text-decoration-underline mb-2" target="_blank">
                                Добавить тест
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="fs-4 fw-bolder">Итоговый тест:</div>

{{--                @if ($module->tests->count() == 0)--}}
{{--                    <p class="text-danger fw-bolder mb-0">Нет итогового теста.</p>--}}
{{--                @endif--}}

{{--                @foreach($module->tests as $test)--}}
{{--                    <div class="fs-5 mb-2">Тест #{{ $test->id }}</div>--}}
{{--                @endforeach--}}

{{--                <a href="{{ route('tests.create', ['moduleId' => $module->id]) }}" target="_blank">--}}
{{--                    <button class="btn btn-light mt-3">Добавить тест</button>--}}
{{--                </a>--}}
            </div>
        </div>
    @endforeach
@endsection
