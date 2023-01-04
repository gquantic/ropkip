@extends('layouts.app')

@section('content')
{{--    @dd($orderData)--}}
    <div class="container">
        <h4 class="fs-2">Заказ успешно оформлен!</h4>

        <p class="fs-4 mb-1 mt-3"><b>Данные заказа:</b></p>
        <p class="fs-5 mb-0">Номер заказа: <b>{{ $orderData['order_id'] }}</b></p>
        <p class="fs-5 mb-0">Способ оплаты:
            <b>@if ($order->installment) Оплата в рассрочку @else Оплата сразу за курс @endif</b>
        </p>
        <p class="fs-5 mb-0">Итого к оплате: <b>{{ $order->price }}</b> руб.</p>
        <p class="fs-5 mb-0">Всего оплачено: <b>{{ $order->payed }}</b> руб.</p>

        <hr>

        <p class="fs-4 mb-1">Используйте для входа данные:</p>
        <p class="fs-5 mb-0">Email: <b>{{ $orderData['email'] }}</b></p>
        <p class="fs-5">Пароль: <b>{{ $orderData['password'] }}</b></p>

        @if ($order->installment === 1 && $order->payed < $order->price && $order->payed < ($order->price * 0.1))
            <p class="fs-4 text-danger">Для начала внесите взнос 10%.</p>

            <div>
                <a href="{{ route('login') }}" target="_blank">
                    <button class="btn btn-primary w-25">Перейти к оплате</button>
                </a>
            </div>
        @elseif ($order->installment === 1 && $order->payed > ($order->price * 0.1))
            <p class="fs-4 text-danger">Вы взяли курс в рассрочку. Остальную часть необходимо доплатить после завершения.</p>

            <div>
                <a href="{{ route('login') }}" target="_blank">
                    <button class="btn btn-light">Войти и перейти к обучению</button>
                </a>
                <a href="{{ route('login') }}" target="_blank" style="margin-left: 10px;">
                    <button class="btn btn-primary w-25">Перейти к оплате</button>
                </a>
            </div>
        @elseif ($order->installment === 0 && $order->payed < $order->price)
            <p class="fs-4 text-danger">Для начала обучения оплатите курс.</p>

            <div>
                <a href="{{ route('login') }}" target="_blank">
                    <button class="btn btn-primary w-25">Перейти к оплате</button>
                </a>
            </div>
        @else
            <div>
                <a href="{{ route('login') }}" target="_blank">
                    <button class="btn btn-light">Войти и перейти к обучению</button>
                </a>
                <a href="{{ route('login') }}" target="_blank" style="margin-left: 10px;">
                    <button class="btn btn-primary w-25">Перейти к оплате</button>
                </a>
            </div>
        @endif
    </div>
@endsection
