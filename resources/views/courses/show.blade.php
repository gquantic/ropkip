@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <h4>{{ $course->title }}</h4>

            <p class="mb-0">{{ $course->description }}</p>

            <div class="row" id="materials">
                @foreach($materials as $material)
                    <div class="col-md-12 mb-xl-1 mt-xl-4">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('courses.show', $material->id ) }}">{{ $material->title }}</a>
                                        <p class="mb-0">{{ $material->description }}</p>

                                        @if ($material->links->count() > 0)
                                            <hr>
                                            <p class="mb-0 mb-1">Ссылки материала:</p>
                                            @foreach($material->links as $link)
                                                <a class="d-block" href="{{ $link->url }}">{{ $link->title }}</a>
                                            @endforeach
                                        @endif
                                    </div>
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
