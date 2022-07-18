<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Session;

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

//------------------user route-------------

Route::get('/login',[UserController::class,'logindex'])->middleware('alreadyLoggedIn');
Route::get('/registeration',[UserController::class,'create'])->middleware('alreadyLoggedIn');
Route::post('/register-user',[UserController::class,'store'])->name('register-user');
Route::post('/login-user',[UserController::class,'loginUser'])->name('login-user');
Route::get('/logout',[UserController::class,'logout']);


//------------------user route-------------

Route::get('/admin/index', function () {
    return view('admin.index');
})->name('admin');

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin/users');

Route::get('/admin/add-products', function () {
    return view('admin.add-products');
})->name('admin/add-products');


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

// Route::get('/login', function () {
//     return view('pages.login');
// });

// Route::get('/register', function () {
//     return view('pages.register');
// });
