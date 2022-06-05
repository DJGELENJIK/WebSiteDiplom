Ошибка в {{env('APP_NAME')}}
<b>Сообщение: </b><code>{{$message}}</code>
<b>Описание: </b><code>{{$description}}</code>
<b>Файл: </b><code>{{$file}}</code>
<b>Строка: </b><code>{{$line}}</code>
@if(Auth::user())
<b>Пользователь: </b><code></code>
@endif

