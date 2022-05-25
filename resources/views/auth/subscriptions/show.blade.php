@extends('auth.layouts.master')

@section('title', 'Подписка' .   $subscription->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Подписка №{{  $subscription->id }}</h1>
                    <p>Почта Заказчика: <b>{{  $subscription->email}}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>id товара</th>
                        </tr>
                        </thead>
                        <td>{{$subscription->product_id}}</td>
                    </table>
                    </tr>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
