@extends('layouts.admin')

@section('title')
    Создание материала
@endsection

@section('content')
    <form class="row" action="{{ route('a_materials.store') }}" method="post">
        @csrf
        <input type="text" name="module" value="{{ $_GET['moduleId'] }}" hidden>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="">Название материала *</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Ссылка *</label>
                        <input type="text" name="url" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Описание</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Создать</button>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="">Длительность аудиторной работы</label>
                        <input type="text" name="duration_seminar" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Длительность самостоятельной работы</label>
                        <input type="text" name="duration_self" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Длительность экзаменационной работы</label>
                        <input type="text" name="duration_exam" class="form-control">
                    </div>

                    <div class="alert alert-warning mt-4 mb-0">
                        Пустые поля будут преобразованы в <b>0</b>.
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
