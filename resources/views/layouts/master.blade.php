<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&display=swap" rel="stylesheet">
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

            </ul>
            <div class="nav-lang"><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></div>
            @guest
                <div class="nav-auth"><a href="{{route ('login' )}}">
                        <svg width="50" height="50" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M222 327.8C220.111 329.966 219.114 332.768 219.212 335.64C219.31 338.513 220.495 341.241 222.527 343.273C224.559 345.305 227.287 346.49 230.16 346.588C233.032 346.686 235.834 345.689 238 343.8L318.86 263C320.973 260.874 322.159 257.998 322.159 255C322.159 252.002 320.973 249.126 318.86 247L238.05 166.18C235.884 164.291 233.082 163.294 230.21 163.392C227.337 163.49 224.609 164.675 222.577 166.707C220.545 168.739 219.36 171.467 219.262 174.34C219.164 177.212 220.161 180.014 222.05 182.18L283.52 243.64H63.9001C60.8925 243.64 58.0081 244.835 55.8815 246.961C53.7548 249.088 52.5601 251.972 52.5601 254.98C52.5601 257.988 53.7548 260.872 55.8815 262.999C58.0081 265.125 60.8925 266.32 63.9001 266.32H283.47L222 327.8Z" fill="white"/>
                            <path d="M372.84 59.53H184.26C172.159 59.5459 160.558 64.3609 152.002 72.9188C143.446 81.4766 138.633 93.0787 138.62 105.18V151.3C138.708 154.248 139.94 157.046 142.056 159.1C144.172 161.154 147.006 162.303 149.955 162.303C152.904 162.303 155.737 161.154 157.854 159.1C159.97 157.046 161.202 154.248 161.29 151.3V105.18C161.29 99.0801 163.713 93.2299 168.027 88.9166C172.34 84.6032 178.19 82.18 184.29 82.18H372.84C378.94 82.18 384.79 84.6032 389.103 88.9166C393.417 93.2299 395.84 99.0801 395.84 105.18V407C395.84 413.1 393.417 418.95 389.103 423.263C384.79 427.577 378.94 430 372.84 430H184.26C178.16 430 172.31 427.577 167.997 423.263C163.683 418.95 161.26 413.1 161.26 407V362C161.305 360.483 161.045 358.973 160.496 357.558C159.946 356.143 159.119 354.854 158.062 353.765C157.005 352.676 155.74 351.81 154.342 351.219C152.945 350.628 151.442 350.323 149.925 350.323C148.407 350.323 146.905 350.628 145.508 351.219C144.11 351.81 142.845 352.676 141.788 353.765C140.731 354.854 139.903 356.143 139.354 357.558C138.805 358.973 138.545 360.483 138.59 362V407C138.603 419.101 143.416 430.703 151.972 439.261C160.528 447.819 172.129 452.634 184.23 452.65H372.84C384.943 452.637 396.547 447.823 405.105 439.265C413.663 430.707 418.477 419.103 418.49 407V105.18C418.477 93.077 413.663 81.4734 405.105 72.9152C396.547 64.3571 384.943 59.5433 372.84 59.53Z" fill="white"/>
                        </svg>
                    </a></div>
            @endguest

            @auth()
                @admin
                <div class="nav-auth"><a href="{{route('home')}}"><svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 14V16C10.4087 16 8.88258 16.6321 7.75736 17.7574C6.63214 18.8826 6 20.4087 6 22H4C4 19.8783 4.84285 17.8434 6.34315 16.3431C7.84344 14.8429 9.87827 14 12 14V14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM21 17H22V22H14V17H15V16C15 15.2044 15.3161 14.4413 15.8787 13.8787C16.4413 13.3161 17.2044 13 18 13C18.7956 13 19.5587 13.3161 20.1213 13.8787C20.6839 14.4413 21 15.2044 21 16V17ZM19 17V16C19 15.7348 18.8946 15.4804 18.7071 15.2929C18.5196 15.1054 18.2652 15 18 15C17.7348 15 17.4804 15.1054 17.2929 15.2929C17.1054 15.4804 17 15.7348 17 16V17H19Z" fill="white"/>
                        </svg></a></div>
            @else
                <div class="nav-auth"><a href="{{route('person.orders.index')}}">@lang('main.my_orders') </a></div>
                @endadmin
                <div class="nav-auth"><a href="{{route ('get-logout' )}}"><svg width="50" height="50" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M110.56 182.18C112.449 180.014 113.446 177.212 113.348 174.34C113.25 171.467 112.065 168.739 110.033 166.707C108.001 164.675 105.273 163.49 102.4 163.392C99.5281 163.294 96.7258 164.291 94.56 166.18L13.7 246.98C11.5871 249.106 10.4012 251.982 10.4012 254.98C10.4012 257.978 11.5871 260.854 13.7 262.98L94.51 343.8C96.6758 345.689 99.4781 346.686 102.35 346.588C105.223 346.49 107.951 345.305 109.983 343.273C112.015 341.241 113.2 338.513 113.298 335.64C113.396 332.768 112.399 329.966 110.51 327.8L49.04 266.34H268.66C271.668 266.34 274.552 265.145 276.679 263.019C278.805 260.892 280 258.008 280 255C280 251.992 278.805 249.108 276.679 246.981C274.552 244.855 271.668 243.66 268.66 243.66H49.09L110.56 182.18Z" fill="white"/>
                            <path d="M372.84 59.53H184.26C172.159 59.5459 160.558 64.3609 152.002 72.9188C143.446 81.4766 138.633 93.0787 138.62 105.18V151.3C138.708 154.248 139.94 157.046 142.056 159.1C144.172 161.154 147.006 162.303 149.955 162.303C152.904 162.303 155.737 161.154 157.854 159.1C159.97 157.046 161.202 154.248 161.29 151.3V105.18C161.29 99.0801 163.713 93.2299 168.027 88.9166C172.34 84.6032 178.19 82.18 184.29 82.18H372.84C378.94 82.18 384.79 84.6032 389.103 88.9166C393.417 93.2299 395.84 99.0801 395.84 105.18V407C395.84 413.1 393.417 418.95 389.103 423.263C384.79 427.577 378.94 430 372.84 430H184.26C178.16 430 172.31 427.577 167.997 423.263C163.683 418.95 161.26 413.1 161.26 407V362C161.305 360.483 161.045 358.973 160.496 357.558C159.946 356.144 159.119 354.854 158.062 353.765C157.005 352.676 155.74 351.81 154.342 351.219C152.945 350.628 151.442 350.323 149.925 350.323C148.407 350.323 146.905 350.628 145.508 351.219C144.11 351.81 142.845 352.676 141.788 353.765C140.731 354.854 139.903 356.144 139.354 357.558C138.805 358.973 138.545 360.483 138.59 362V407C138.603 419.101 143.416 430.703 151.972 439.261C160.528 447.819 172.129 452.634 184.23 452.65H372.84C384.943 452.637 396.547 447.823 405.105 439.265C413.663 430.707 418.477 419.103 418.49 407V105.18C418.477 93.077 413.663 81.4734 405.105 72.9152C396.547 64.3571 384.943 59.5433 372.84 59.53V59.53Z" fill="white"/>
                        </svg></a></div>
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
            <div class="blob orange"></div>
        </div>
    </div>
</footer>

</body>

<script>
    var botmanWidget = {
        introMessage: "Добрый день!",
        title: "Чат-бот",
        placeholderText: "Написать...",
        aboutText: '',
        bubbleBackground: "#febd24",
        mainColor: "#161717",
        frameEndpoint: '/chatbot/chatbot',
        bubbleAvatarUrl: "https://www.pinclipart.com/picdir/big/521-5218494_mobile-icon-clip-art-mobile-icon-png-download.png"
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<style>
    .desktop-closed-message-avatar {
        border-radius: 50%;
        margin: 10px;
        transform: scale(1);
        background: rgba(255, 121, 63, 1);
        box-shadow: 0 0 0 0 rgba(255, 121, 63, 1);
        animation: pulse-orange 4s infinite;
    }
    @keyframes pulse-orange {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(255, 121, 63, 0.7);
        }

        70% {
            transform: scale(1);
            box-shadow: 0 0 0 10px rgba(255, 121, 63, 0);
        }

        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(255, 121, 63, 0);
        }
    }
    #botmanWidgetRoot>div>div>div {
        color: #fff !important;
    }
</style>
</html>
