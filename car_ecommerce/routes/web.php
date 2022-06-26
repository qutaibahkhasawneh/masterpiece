<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/master', function () {
    return view('layouts.master');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/cart', function () {
    return view('pages.cart');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/single-product', function () {
    return view('pages.single-product');
});
Route::get('/shop', function () {
    return view('pages.shop');
});
Route::get('/checkout', function () {
    return view('pages.checkout');
});
Route::get('/profile', function () {
    return view('pages.profile');
});
Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/register', function () {
    return view('pages.register');
});
