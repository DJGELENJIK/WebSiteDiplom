<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!—Название сайта и кнопка раскрытия меню для мобильных-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#responsive-menu">
                <span class="sr-only">Toggle navigation</span>
                <div class="rotate-icon">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
            <a class="navbar-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
            <ul class="nav navbar-nav">
                <li @routeactive('index')><a href="{{route('index')}}">@lang('main.all_products')</a></li>
                <li @routeactive('categor')><a href="{{route('categories')}}">@lang('main.categories')</a>
                </li>
                <li @routeactive('basket') ><a href="{{route('basket')}}">@lang('main.cart')</a></li>
                <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
            </ul>
            @guest
                <div class="nav-auth"><a href="{{route ('login' )}}">@lang('main.login')</a></div>
            @endguest

            @auth()
                @admin
                <div class="nav-auth"><a href="{{route('home')}}">@lang('main.admin_panel')</a></div>
            @else
                <div class="nav-auth"><a href="{{route('person.orders.index')}}">@lang('main.my_orders') </a></div>
                @endadmin
                <div class="nav-auth"><a href="{{route ('get-logout' )}}">@lang('main.logout')</a></div>
            @endauth
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

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6"><p>Категории товаров</p>
                    <ul>

                        @foreach($categories as $category)
                            <li><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6"><p>Самые популярные товары</p>
                    <ul>

                        @foreach ($bestProducts as $bestProduct)
                            <li><a href="{{ route('product', [$bestProduct->category->code, $bestProduct->code]) }}">{{ $bestProduct->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </footer>
</div>

</body>
</html>
