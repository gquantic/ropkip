@extends('layouts.admin')

@section('title')
    Создание квалификации
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('a_ctype.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Категория</label>
                            <select name="category" id="" class="form-control select2">
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"
                                            @if(isset($_GET['categoryId']) && $category->id == $_GET['categoryId']) selected @endif>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Название</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Создать квалификацию</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
