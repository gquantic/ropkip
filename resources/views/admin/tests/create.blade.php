@extends('layouts.admin')

@section('title')
    Создание теста
@endsection

@section('content')
    <div class="card">
        <form class="card-body" method="post" action="{{ route('tests.store') }}">
            @csrf
            <div class="alert alert-primary">
                Для создания теста выберите модуль, для которого хотите его создать.
            </div>

            <div class="form-group mb-2">
                <label for="">Название теста</label>
                <input type="text" name="title" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="">Модуль</label>
                <select name="module" id="" class="form-control select2 select2-search">
                    @foreach(\App\Models\CoursePlanModule::all() as $module)
                        <option value="{{ $module->id }}" @if(isset($_GET['moduleId']) && $_GET['moduleId'] == $module->id) selected @endif>
                            Модуль "{{ $module->title }}" - Курс "{{ $module->course->title }}"
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary mt-3" type="submit">Создать тест</button>
        </form>
    </div>
@endsection
