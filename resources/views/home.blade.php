@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="mt-2 mb-3">Приобретенные курсы</h3>
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="row">
                @foreach($buyedCourses as $buyedCourse)
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="position-absolute" style="right: 0; margin-right: 25px;">
                                    @if ($buyedCourse->installment === 1 && $buyedCourse->payed < $buyedCourse->price && $buyedCourse->payed < ($buyedCourse->price * 0.1))
                                        <div class="badge bg-danger text-white fw-light">Внесите взнос</div>
                                    @elseif ($buyedCourse->installment === 1 && $buyedCourse->payed > ($buyedCourse->price * 0.1))
                                        <div class="badge bg-warning text-white fw-light">В рассрочку</div>
                                    @elseif ($buyedCourse->installment === 0 && $buyedCourse->payed < $buyedCourse->price)
                                        <div class="badge bg-danger text-white fw-light">Не оплачен</div>
                                    @else
                                        <div class="badge bg-green text-white fw-light">Оплачен</div>
                                    @endif
                                </div>
                                <p class="fs-4 mb-1">{{ $buyedCourse->course->title }}</p>
                                <p class="fs-6">{{ $buyedCourse->course->description }}</p>
                                <div class="d-flex">
                                    <a href="{{ route('order.show', $buyedCourse->id) }}" style="margin-right: 10px;">Просмотреть заказ</a>
                                    <a href="{{ route('courses.teach', $buyedCourse->id) }}">Перейти к курсу</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
