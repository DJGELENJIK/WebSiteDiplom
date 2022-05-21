<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')><a href="{{route('index')}}">Все товары</a></li>
                <li @routeactive('categor*')><a href="{{route('categories')}}">Категории</a>
                </li>
                <li @routeactive('basket*') ><a href="{{route('basket')}}">В корзину</a></li>
{{--                <li><a href="{{route('reset_db')}}">Сбросить проект в начальное состояние</a></li>--}}
            </ul>
            <ul
                class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{route ('login' )}}">Войти </a></li>
                @endguest

                @auth()
                    @admin
                            <li><a href="{{route('home')}}">Панель администратора </a></li>
                        @else
                            <li><a href="{{route('person.orders.index')}}">Мои заказы </a></li>
                        @endadmin

                    <li><a href="{{route ('get-logout' )}}">Выйти</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
            @if(session()->has('warning'))
                <p class="alert alert-warning">{{session()->get('warning')}}</p>
            @endif
    @yield('content')
    </div>
</div>
</body>

<script>
    var botmanWidget = {
        introMessage: "Добрый день!",
        title: "Чат-бот",
        placeholderText: "Написать...",
        aboutText: '',
        bubbleBackground: "#febd24",
        mainColor: "#febd24",
        frameEndpoint: '/chatbot/chatbot',
        mobileWidth: '100%',
        bubbleAvatarUrl: "https://avatars.mds.yandex.net/get-zen_doc/3582174/pub_60c062ac364f3c4e9fcfa886_60c06307df00c7571d414d53/scale_1200"
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</html>
