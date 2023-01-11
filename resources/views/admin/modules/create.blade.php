@extends('layouts.admin')

@section('title')
    Создание новой категории
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <b class="fs-5">Информация</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('a_modules.store') }}" method="post">
                        @csrf
                        <input type="text" name="course" value="{{ $_GET['course'] }}" hidden>
                        <input type="text" name="plan" value="{{ $_GET['plan'] }}" hidden>
                        <div class="group mb-3">
                            <label for="">Название модуля</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Создать модуль</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
