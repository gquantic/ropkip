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
                    <form action="{{ route('a_category.store') }}" method="post">
                        @csrf
                        <div class="group mb-3">
                            <label for="">Название категории</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="group">
                            <label for="">Описание категории</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Создать категорию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
