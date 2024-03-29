<div class="col-sm-6 col-md-6 col-lg-4">
    <div class="thumbnail">
        <div class="labels">
            <div class="labels">
                @if($product->isNew())
                    <span class="badge badge-success">@lang('main.properties.new')</span>
                @endif

                @if($product->isRecommend())
                    <span class="badge badge-warning">@lang('main.properties.recommend')</span>
                @endif

                @if($product->isHit())
                    <span class="badge badge-danger">@lang('main.properties.hit')</span>
                @endif
            </div>
        </div>
        <img src="{{Storage::url($product->image)}}" alt="{{$product->__('name')}}">
        <div class="caption">
            <h3>{{$product->__('name')}}</h3>
            <p>{{$product->price}} @lang('main.rub').</p>
            <p>
            <form action="{{route('basket-add',$product->id)}}" method="POST">
                @if($product->isAvailable())
                    <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_basket')</button>
                @else
                    @lang('main.not_available')
                @endif
                <a href="{{ route('product',[isset($category) ? $category->name: $product->category->name, $product->code]) }}"
                   class="btn btn-default"
                   role="button">@lang('main.more')</a>
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>
<style>
    .labels {
        display: flex;
        margin-top: 2px;
        margin-left: 2px;
    }
    .thumbnail>img {
        margin-top: 35px;
    }
    .labels .labels>span {
        padding: 5px;
        margin-left: 5px;
        font-family: 'Oswald', sans-serif;
        font-weight: 400;
        font-size: 16px;
        text-transform: uppercase;
        color: #fff;
        letter-spacing: 2px;
    }

</style>
