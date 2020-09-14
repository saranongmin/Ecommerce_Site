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
// */
Route::get('/', 'FrontendController@welcome')->name('welcome');
Route::get('/blogs', 'FrontendController@blog')->name('blogs');
Route::get('/about', 'FrontendController@about')->name('about');

Route::get('/products/{category?}', 'FrontendController@products')->name('products.list');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');



Route::get('/thankyou', function () {
    return view('frontend.thankyou');
})->name('thankyou');








Route::get('/products/{category}/{subCategory?}', 'FrontendController@products')->name('products.list');
Route::get('/product-details/{product}/', 'FrontendController@productDetails')->name('product.details');

Route::post('/place-order', 'OrderController@store')->name('place_order');
Route::post('/add_to_cart', 'CartController@addToCart')->name('add_to_cart');
Route::post('/remove_from_cart', 'CartController@removeFromCart');
Route::get('/shopping-bag', 'CartController@getProductsFromCart')->name('shopping_bag');

Route::post('/checkout', 'CartController@checkout')->name('checkout');

Route::post('/payment-test', 'CartController@sslTest')->name('payment_test');

Route::post('/success', 'CartController@success')->name('payment.success');
Route::post('/failed', 'CartController@failed')->name('payment.failed');
Route::post('/canceled', 'CartController@canceled')->name('payment.canceled');


Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

Route::get('/', function (){
    return view('backend.dashboard');
    })->name('dashboard');

    Route::get('/my-profile', 'UserController@myProfile')->name('my_profile');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{id}', 'UserController@update')->name('users.update');


    

Route::get('/categories/pdf', 'PdfController@categories')->name('categories.pdf');

    Route::get('/categories/excel', 'ExcelController@categories')->name('categories.excel');
 Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
    Route::get('/categories/trash/{id}', 'CategoryController@showTrash')->name('categories.show_trash');
    Route::put('/categories/trash/{id}', 'CategoryController@restoreTrash')->name('categories.restore_trash');
    Route::delete('/categories/trash/{id}', 'CategoryController@deleteTrash')->name('categories.delete_trash');


Route::get('/products/pdf', 'ProductPdfController@products')->name('products.pdf');
    Route::get('/products/excel', 'ProductExcelController@products')->name('products.excel');
     Route::get('/products/trash', 'ProductController@trash')->name('products.trash');
    Route::get('/products/trash/{id}', 'ProductController@showTrash')->name('products.show_trash');
    Route::put('/products/trash/{id}', 'ProductController@restoreTrash')->name('products.restore_trash');
    Route::delete('/products/trash/{id}', 'ProductController@deleteTrash')->name('products.delete_trash');
    Route::resource('categories', 'CategoryController');

    route::resource('products','ProductController');
    Route::get('color/test','ColorController@test');
 Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('sub-categories', 'SubCategoryController');
    Route::post('products/{product}/comment', 'CommentController@productComment')->name('products.comment');
    Route::get('products/{product}/notification/{notificationId}', 'ProductController@show')->name('products.notification');
    Route::resource('products', 'ProductController');
    Route::resource('colors', 'ColorController');
    Route::resource('sizes', 'SizeController');
    Route::resource('brands', 'BrandController');
    Route::resource('tags', 'TagController');
    Route::resource('blogs', 'BlogController');


});

