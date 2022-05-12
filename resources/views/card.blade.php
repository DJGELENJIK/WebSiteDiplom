<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">

        </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}}</p>
            <p>
                <a action="{{route('basket')}}" class="btn btn-primary"
                   role="button">В корзину</a>
                <a href="{{ route('product',[$product->category->name,$product->code]) }}"
                   class="btn btn-default"
                   role="button">Подробнее</a>
                <input type="hidden" name="_token" value="tDuVzs6YD66m0pimZBEH0lSDLhmS9qmbhWP4Tfop">            </form>
            </p>
        </div>
    </div>
</div>
