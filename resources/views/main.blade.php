@extends('layouts.master',['file'=>'index'])

@section('title',__('main.title'))
@section('content')
    <style>
        .content {
            margin-top: 25px;
        }


        .title-text {
            font-family: 'Oswald', sans-serif;
            margin-bottom: 45px;
        }

        .gradles {
            display: grid;
            place-items: center;
            gap: 20px;
            grid-template-columns : repeat(3, 1fr);
        }

        .gradles-elem {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            text-align: left;
        }

        .gradles-text {
            width: 100px;
            margin: 0;
        }

        .gradles-img {
            height: 35px;
            margin-right: 15px;
        }
        @media (max-width: 767px ) {
            .gradles {
                grid-template-columns : repeat(2, 1fr);
            }
        }

        @media (max-width: 499px) {
            .gradles-text {
                width: 70px;
            }
        }
        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 160px;
            background-color: #FFF;
            border-radius: 35px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
        }
        .popular-img {
            height: auto;
        }
        @media (max-width: 767px) {
            .swiper {
                width: 316px;
            }
        }
    </style>

    <div class="content">
        <h1>@lang('main.popular_product')</h1>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($bestProducts as $bestProduct)
                <div class="swiper-slide">
                    <img class="popular-img" src="{{ Storage::url($bestProduct->image) }}" alt="{{ $bestProduct->price }}" />
                    <a class="popular-link" href="{{ route('product', [$bestProduct->category->code, $bestProduct->code]) }}">{{ $bestProduct->name }}</a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    </div>
    <div class="content second">
        <h2 class="title-text">@lang('main.why_choose')</h2>
        <div class="gradles">
            <div class="gradles-elem">
            <img class="gradles-img" src="{{ asset('img/payment.svg') }}">
            <p class="gradles-text">@lang('main.oplata')</p>
            </div>
            <div class="gradles-elem">
                <img class="gradles-img" src="{{ asset('img/product.svg') }}">
                <p class="gradles-text">@lang('main.kach')</p>
            </div>
            <div class="gradles-elem">
                <img class="gradles-img" src="{{ asset('img/fast_delivery.svg') }}">
                <p class="gradles-text">@lang('main.fast')</p>
            </div>
            <div class="gradles-elem">
                <img class="gradles-img" src="{{ asset('img/clock.svg') }}">
                <p class="gradles-text">@lang('main.work')</p>
            </div>
            <div class="gradles-elem">
                <img class="gradles-img" src="{{ asset('img/fast_order.svg') }}">
                <p class="gradles-text">@lang('main.zakaz')</p>
            </div>
            <div class="gradles-elem">
                <img class="gradles-img" src="{{ asset('img/respect.svg') }}">
                <p class="gradles-text">@lang('main.klient')</p>
            </div>
            <div class="gradles-elem">
                <img class="gradles-img" src="{{ asset('img/return.svg') }}">
                <p class="gradles-text">@lang('main.brak')</p>
            </div>
            <div class="gradles-elem">
                <img class="gradles-img" src="{{ asset('img/postav.svg') }}">
                <p class="gradles-text">@lang('main.post')</p>
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            autoplay: {
                delay: 3500,
                disableOnInteraction: true,
            },
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
@endsection

