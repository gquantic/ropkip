@extends('layouts.admin')

@section('title')
    Редактирование теста "{{ $test->title }}"
@endsection

@section('content')
    @foreach($test->questions()->get() as $question)
        <div class="card">
            <div class="card-body">
                <div class="fs-5 fw-bold mb-3">{{ $question->title }}</div>

                <div class="form-group">
                    @foreach($question->answers as $key => $answer)
                        @php
                            $answerCount = 1;
                        @endphp

                        <label for="q{{ $question->id }}-{{ $key + 1 }}" class="fw-light">
                            @if($question->type == 'checkbox')
                                <input type="checkbox" class="mr-2" name="q{{ $answerCount }}" id="q{{ $question->id }}-{{ $key + 1 }}">
                            @else
                                <input type="radio" class="mr-2" name="{{ $question->id }}" value="{{ $key + 1 }}" id="q{{ $question->id }}-{{ $key + 1 }}">
                            @endif

                            {{ $answer }}
                        </label>

                        @php
                            $answerCount++;
                        @endphp

                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    <a href="{{ route('questions.create', ['testId' => $test->id]) }}" class="btn btn-primary">Добавить вопрос</a>
@endsection
