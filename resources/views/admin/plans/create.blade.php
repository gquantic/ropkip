@extends('layouts.admin')

@section('title')
    Создание плана для курса "{{ \App\Models\Course::find($_GET['courseId'])->title }}"
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <b class="fs-5">Информация</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('a_plan.store') }}" method="post">
                        @csrf
                        <input type="text" name="course" value="{{ $_GET['courseId'] }}" hidden>
                        <div class="group mb-3">
                            <label for="">Цена обучения по плану</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Создать категорию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
