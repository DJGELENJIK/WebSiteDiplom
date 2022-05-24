@extends('layouts.master',['file'=>'index'])

@section('title',__('main.title'))
@section('content')
    <style>
        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
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
    </style>

    <div class="content">
        <h2>Популярные товары</h2>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($bestProducts as $bestProduct)
                <div class="swiper-slide">
                    <img src="{{ Storage::url($bestProduct->image) }}" alt="{{ $bestProduct->price }}" />
                    <a class="popular-link" href="{{ route('product', [$bestProduct->category->code, $bestProduct->code]) }}">{{ $bestProduct->name }}</a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
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

