@extends('layouts.master',['file'=>'index'])

@section('title',__('main.title'))
@section('content')
<h1>@lang('main.all_products')</h1>
<form method="GET" action="{{route("index")}}">
    <div class="filters row">
        <div class="">
            <label for="price_from">@lang('main.price_from')
                <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
            </label>
            <label for="price_to">@lang('main.to')
                <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
            </label>
        </div>
        <div class="">
            <label class="lebel" for="hit">
                <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> @lang('main.properties.hit')
            </label>
            <label class="lebel" for="new">
                <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> @lang('main.properties.new')
            </label>
            <label class="lebel" for="recommend">
                <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> @lang('main.properties.recommend')
            </label>
        </div>


    </div>
    <div class="">
        <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
        <a href="{{ route("index") }}" class="btn btn-warning">@lang('main.reset')</a>
    </div>
</form>

        <div class="row">
            @foreach($products as $product)
                @include('layouts.card',compact('product'))
            @endforeach
        </div>
    {{$products->links()}}

@endsection

<style>

    .filters.row {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .lebel>input {
        margin-right: 5px !important;
        margin-left: 5px !important;
    }
</style>
