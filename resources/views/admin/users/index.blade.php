@extends('layouts.admin')

@section('title')
    Пользователи
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Почта</th>
                        <th>Курсов приобретено</th>
                        <th>Дата регистрации</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\User::all() as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->buyedCourses->count() }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}">
                                    <button class="btn-light waves-effect"><i class="mdi mdi-account-edit"></i></button>
                                </a>
                                <a href="">
                                    <button class="btn-light"><i class="mdi mdi-account-remove"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
