@extends('auth.layouts.master')

@section('title','Админка бота')

@section('content')
    <div class="col-md-12">
        <h1>Админка бота</h1>
    </div>
    <table class="table">
        <tbody>
        <tr>
            <th>
                Id
            </th>
        @foreach($bot as $bot_men)
            <tr>
                <td>{{ $bot_men->id }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('bot.destroy',$bot_men) }}" method="POST">
                            <a class="btn btn-success" type="button" href="{{ route('bot.show',$bot_men) }}">Открыть</a>
                            <a class="btn btn-warning" type="button" href="{{ route('bot.edit', $bot_men) }}">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Удалить"></form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{ $categories->links() }}--}}

{{--    <a class="btn btn-success" type="button"--}}
{{--       href="{{ route('categories.create') }}">Добавить категорию</a>--}}
{{--    </div>--}}
    @endsection
        </tr>


