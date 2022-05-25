@extends('auth.layouts.master')

@section('title','Подписчики')

@section('content')
    <div class="col-md-12">
        <h1>Подписки</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Почта
                </th>
                <th>
                    Когда отправлен
                </th>
                <th>
                    Статус
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{$subscription->id}}</td>
                    <td>{{$subscription->email}}</td>
                    <td>{{$subscription->created_at->format('H:i d/m/Y')}}</td>
                    <td>{{$subscription->status}}</td>
                    <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-success" type="button"
                           @admin
                           href="{{ route('subscriptions.show', $subscription) }}"
                            @endadmin
                        >Открыть</a>
                    </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
