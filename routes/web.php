<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Request as Input;
use App\Models\Product;
use App\Models\Category;

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
Route::get('locale/{locale}', 'App\Http\Controllers\MainController@changeLocale')->name('locale');

Route::get('/chatbot/chatbot', function () {
    return view('bot');
});

Route::get('/search','App\Http\Controllers\MainController@search')->name('search');

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);

Route::get('reset','App\Http\Controllers\ResetController@reset')->name('reset_db');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');

Route::middleware(['set_locale'])->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::group([
            'prefix'=>'person',
            'namespace'=>'App\Http\Controllers\Person',
            'as'=>'person.'

        ],function (){
            Route::get('/orders', 'OrderController@index')->name('orders.index');
            Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');

        });

        Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'
        ], function () {
            Route::group(['middleware' => 'is_admin'], function () {
                Route::get('/orders', 'OrderController@index')->name('home');
                Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
                Route::get('/subscriptions','SubscriberController@index')->name('back');
                Route::get('/subscriptions/{subscription}','SubscriberController@show')->name('subscriptions.show');
            });
            Route::resource('categories', 'CategoryController');
        });
        Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    });


    Route::get('/','App\Http\Controllers\MainController@main' )->name('main');
    Route::get('/product','App\Http\Controllers\MainController@index' )->name('index');
    Route::get('/categories','App\Http\Controllers\MainController@categories')->name('categories');


    Route::post('subscription/{product}', 'App\Http\Controllers\MainController@subscribe')->name('subscription');


    Route::group(['prefix'=>'basket'], function () {
        Route::post('/add/{product}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');

        Route::group(['middleware' => 'basket_not_empty'], function () {
            Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
            Route::get('/place', 'App\Http\Controllers\BasketController@basketPlace')->name('basket-place');
            Route::post('/remove/{product}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
            Route::post('/place', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');
        });
    });

    Route::get('/{category}','App\Http\Controllers\MainController@category' )->name('category');
    Route::get('/{category}/{product?}','App\Http\Controllers\MainController@product')->name('product');

    Route::get('/search', function (){
        $q =Input::get('q');
        if($q !=""){
            $products = Product::where('name','LIKE', '%' .$q. '%')->get();
            if(count($products)>0)
                return view('ConfirmSearch')->withDetails($products)->withQuery($q);
        }
        return view('ConfirmSearch')->withMessage("Ничего не найдено");
    });

});
