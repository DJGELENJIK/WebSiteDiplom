@extends('layouts.master',['file'=>'product'])

@section('title', 'Товар')

@section('content')

    <h1>iPhone X 64GB</h1>
        <h2>{{$product }}</h2>
        <p>Цена: <b>71990 ₽</b></p>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
        <p>Отличный продвинутый телефон с памятью на 64 gb</p>
@endsection
