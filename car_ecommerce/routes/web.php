<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::get('/profile',[UserController::class,'viewProfile']);
Route::get('/editprofile/{id}',[UserController::class,'edit']);
Route::post('/updateprofile',[UserController::class,'updateProfile']);


//------------------End user route-------------


//-----------------Admin route-----------------

Route::get('/admin_addcategory',[CategoryController::class,'index']);
Route::get('/admin_users',[UserController::class,'addUser']);
Route::get('/delete_users/{id}',[UserController::class,'deleteUser']);
Route::resource('/admin_c',CategoryController::class);
Route::get('/edit_categories/{id}',[CategoryController::class,'editCategories']);
Route::post('/update_categories',[CategoryController::class,'updateCategories']);
Route::get('/delete_categories/{id}',[CategoryController::class,'deleteCategories']);
Route::get('/add_product',[ProductController::class,'index']);
Route::post('/save_products',[ProductController::class,'store']);
Route::get('/create',[ProductController::class,'addProduct']);
Route::post('/update_products',[ProductController::class,'updateProducts']);
Route::get('/edit_products/{id}',[ProductController::class,'editProducts']);
Route::get('/delete_products/{id}',[ProductController::class,'destroy']);



Route::get('/admin/index', function () {
    return view('admin.index');
})->name('admin');

Route::get('/admin_layout', function () {
    return view('admin.layout');
})->name('admin');

Route::get('/admin/insert', function () {
    return view('admin.category.insert');
});

// Route::get('/admin/users', function () {
//     return view('admin.users');
// })->name('admin/users');

// Route::get('/admin/add-products', function () {
//     return view('admin.add-products');
// })->name('admin/add-products');

// Route::get('/admin/operation-categories', function () {
//     return view('admin.operation-categories');
// })->name('admin/operation-categories');


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
Route::get('/edit', function () {
    return view('pages.editprofile');
});

// Route::get('/profile', function () {
//     return view('pages.profile');
// });

// Route::get('/login', function () {
//     return view('pages.login');
// });

// Route::get('/register', function () {
//     return view('pages.register');
// });
