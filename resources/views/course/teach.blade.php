@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($course->courseModules as $module)
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">{{ $module->title }}</div>

                            <div class="d-flex flex-column">
                                @foreach($module->materials as $material)
                                    <a href="{{ $material->link }}">{{ $material->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
