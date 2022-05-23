@extends('layouts.master',['file'=>'product'])

@section('title', __('main.product'))

@section('content')

    <h1>{{ $product->__('name') }}</h1>
    <h2>{{ $product->category->name }}</h2>
    <p>@lang('main.price'): <b>{{ $product->price }} @lang('main.rub').</b></p>
    <img src="{{ Storage::url($product->image) }}">
    <p>{{ $product->__('description') }}</p>

    @if($product->isAvailable())
        <form action="{{ route('basket-add', $product) }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">@lang('main.add_to_basket')</button>
@csrf
    </form>
    @else
        <span>@lang('main.not_available')</span>
        <br>
        <span>@lang('main.tell_me'):</span>
        <div class="warning">
            @if($errors->get('email'))
                {!! $errors->get('email')[0] !!}
            @endif
        </div>
        <form method="POST" action="{{ route('subscription', $product) }}">
            @csrf
            <input type="text" name="email">
            <button type="submit">@lang('main.subscribe')</button>
        </form>
    @endif
@endsection
