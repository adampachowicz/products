<?php

use App\Http\Controllers\ProductsController;



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
// this page display all product in columns and it's main page off aplication

/*
what i need to products page 7 steps
You can make this php artisan make:controller {name} -resource

GET /products (index) -> display all product in shop
GET /products/create (create) -> add new products page
POST /products (store) -> controller to db
GET /products/(example 1) -> (show) display one product
GET /products/(example 1)/edit (edit) -> edit page product
PATH /products/(example 1) (update) -> controller upadate page product
DELETE /product/(example 1) (destroy) -> destroy some product

POST /products (store) 


*/
Route::get('/', function () {
    return view('home');
});

Route::resource('products', 'ProductsController');
Route::post('products/{product}', 'CommentController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
