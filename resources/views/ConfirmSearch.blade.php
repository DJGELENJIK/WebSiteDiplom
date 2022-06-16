@extends('layouts.master',['file'=>'index'])

@section('title',__('main.title'))
@section('content')
    <style>
        .search-result {
            margin-top: 90px;
        }
    </style>
    <form class="search-result" action="/search" method="get" role="search">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-10">
                <input type="text" class="form-control" name="q" placeholder="@lang('main.search')">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary btn-block">@lang('main.search')</button>
            </div>
        </div>

    </form>
    <div class="container">
        @if(isset($details))
            <p> Результаты поиска по вашему запросу: <b> {{ $query }} </b>  </p>
            <table >

                <tbody>
                @foreach($details as $products)
                    <tr>
                        <td><a href="{{ route('product', [$products->category->code, $products->code]) }}">{{$products->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif(isset($message))
            <p>{{ $message }}</p>
        @endif
    </div>

</body>
</html>
