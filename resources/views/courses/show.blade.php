@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row" id="materials">
                <div class="row">
                    <div class="col-xl-7">
                        <h4>{{ $course->title }}</h4>
                        <p class="mb-0">{{ $course->description }}</p>
                        <a href="{{ route('get-course', $course->id) }}" class="btn btn-primary mt-3 w-25">Регистрация</a>
                    </div>
                    <div class="col-xl-5">
                        <h5>Программы курса</h5>
                        @foreach($course->coursePlans()->get() as $plan)
                            <a class="btn btn-light w-100 mb-1">
                                Программа на {{ $plan->courseMaterials()->sum('duration') }} часов -
                                {{ $plan->courseMaterials()->sum('duration_self') * $course->price }} рублей
                            </a>
                        @endforeach
                    </div>
                </div>
                @foreach($course->coursePlans()->get() as $plan)
                    <div class="col-xl-12 mt-4">
                        <div class="card p-0">
                            <div class="card-header" style="background: #f5e0dd;">
                                <b>
                                    <img src="https://lomonosovlo.ru/upload/medialibrary/865/865549b92523a85ed44196a55ada01dd.png" style="width:25px;" alt="">
                                    Учебный план на {{ $plan->courseMaterials()->sum('duration') }} часа</b>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Наименование разделов, модулей, тем</th>
                                        <th>Общая трудоемкость, в акад. час.</th>
                                        <th>Аудиторная работа (семинарские занятия)</th>
                                        <th>Внеаудиторная (самостоятельная работа)</th>
                                        <th>Кол-во часов контроля</th>
                                        <th>Тип контроля</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plan->courseMaterials()->get() as $material)
                                        <tr>
                                            <td>{{ $material->title }}</td>
                                            <td>{{ $material->duration }}</td>
                                            <td>{{ $material->duration_seminar }}</td>
                                            <td>{{ $material->duration_self }}</td>
                                            <td>{{ $material->duration_exam }}</td>
                                            <td>{{ $material->exam }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(window).on('load', function () {
            console.log(1);
            $('#categories').on('input', function () {
                $.post(
                    '/api/category/types',
                    {
                        id: $('#categories').val()
                     },
                    function (data) {
                        $('#category-types *').remove();
                        data = JSON.parse(data);

                        for (let item of data) {
                            $('#category-types').append('<option value="' + item.id + '">' + item.title + '</option>')
                        }
                    }
                );
            });
        });
    </script>
@endpush
