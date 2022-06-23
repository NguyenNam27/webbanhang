<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout');
});
//home login
Route::get('/admin','HomeController@index')->name('admin.index');

Route::post('/postLogin','HomeController@postLogin')->name('admin.postLogin');


Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => 'checkLogin'], function(){



    Route::resource('/user','UserController');
    Route::resource('/slide','SlideController');
    Route::resource('/brand','BrandProductController');
    Route::resource('/product','ProductController');
    Route::resource('/category','CategoryController');
    Route::resource('/coupon','CouponController');

});

//frontend
//trang - chu
Route::get('/trang-chu','ShopController@index')->name('index');


Route::get('/category','ShopController@index')->name('category.index');
Route::get('/brand/{brand_slug}','ShopController@index')->name('brand.brand_slug');


Route::get('/category/{slug_category_product}','ShopController@show_category')->name('show_category');

Route::get('/trang-chu/chi-tiet/{product_id}','ShopController@detail_product')->name('product.detail');

Route::get('/danh-muc','ShopController@category')->name('home.category');
Route::get('/lien-he','ShopController@contact')->name('contact');
Route::get('/lien-he-voi-chung-toi','ShopController@postContact')->name('post.contact');

//shopping cart

Route::get('gio-hang','CartController@index')->name('cart.index');
Route::get('gio-hang/them-san-pham-gio-hang/{product_id}','CartController@addCart')->name('cart.add');
Route::delete('gio-hang/xoa-san-pham/{rowId}','CartController@removeCart')->name('cart.destroy');
Route::post('gio-hang/cap-nhap-gio-hang/','CartController@updateCart')->name('cart.update');
Route::get('gio-hang/tinh-ma-giam-gia','CartController@check_coupon')->name('check.coupon');

Route::post('gio-hang/cap-nhap-san-pham/','CartController@updateCart')->name('updateCart');

//Route::get('giohang','CartController@test')->name('cart');




