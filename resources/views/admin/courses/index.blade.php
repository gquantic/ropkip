@extends('layouts.admin')

@section('title')
    Курсы
@endsection

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-start">
            <a href="{{ route('courses.create') }}" class="btn btn-primary">Новый курс</a>
        </div>
        @foreach(\App\Models\Course::with('coursePlans')->get() as $course)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="fs-5 fw-bolder">{{ $course->title }}</div>
                        <p>{{ $course->description }}</p>

                        <div class="row">
                            <div class="col-xl-2">
                                <p class="fs-6 text-muted mb-0">Планов обучения</p>
                                <p class="fs-5 fw-bolder mb-0">{{ $course->coursePlans->count() }}</p>
                            </div>
                            <div class="col-xl-2">
                                <p class="fs-6 text-muted mb-0">Всего материала в курсе</p>
                                <p class="fs-5 fw-bolder mb-0">{{ \App\Models\CourseMaterial::where('course_id', $course->id)->count() }}</p>
                            </div>
                        </div>

                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-light waves-effect mt-3">Редактировать курс</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
