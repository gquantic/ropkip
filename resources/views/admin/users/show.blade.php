@extends('layouts.admin')

@section('title')
    Редактирование пользователя #{{ $user->id }}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title fw-bolder">Редактирование пользователя</div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group mb-2">
                            <label for="">Имя</label>
                            <input type="text" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Почта</label>
                            <input type="text" class="form-control" value="{{ $user->email }}">
                        </div>
                        <button class="btn btn-primary mt-3 waves-effect">Сохранить</button>
                        <button class="btn btn-warning mt-3 waves-effect"><i class="mdi mdi-lock"></i> Изменить пароль</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title fw-bolder">Приобретенные курсы</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>План</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if($user->buyedCourses->count() == 0)
                            <tr>
                                <td colspan="2">Пользователь еще не приобрел курсов.</td>
                            </tr>
                        @endif

                        @foreach($user->buyedCourses as $course)
                            <tr>
                                <td>{{ \App\Models\Course::find($course->course_id)->title }}</td>
                                <td>{{ \App\Models\CoursePlan::find($course->course_plan_id)->courseMaterials()->sum('duration') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
