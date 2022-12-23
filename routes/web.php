<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\product_codesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductCode;
use App\Models\Category;

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



Route::get('index', function () {
    return view('shop.shop');
});

Route::get('/shopindex', [shopController::class, 'index'])->name('shoplogout');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');
Route::get('/store/{id}', [ShopController::class, 'store'])->name('shop.store');
Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');
Route::get('/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('handdle-login', [UserController::class, 'login'])->name('handdle-login');
Route::get('/showProduct/{id}', [ShopController::class, 'show'])->name('shop.showProduct');

// Route::get('login',function(){
//     return view('admin.login.login');
// });

Route::get('dangki', function () {
    return view('admin.login.dangki');
});

Route::post('/shoplogout', [UserController::class, 'logout'])->name('shoplogout');

Route::get('/viewlogin', [UserController::class, 'viewlogin'])->name('viewlogin');
Route::post('/checklogin', [UserController::class, 'checklogin'])->name('shop.checklogin');

Route::get('/register', [UserController::class, 'register'])->name('shop.register');
Route::post('/checkregister', [UserController::class, 'checkregister'])->name('shop.checkregister');


Route::get('/home', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// xoa meemf
Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
Route::put('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');
// tìm kiếm
Route::get('categories/search', [CategoryController::class, 'search'])->name('categories.search');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/create-products', [ProductController::class, 'create'])->name('products.create');
Route::post('/store-products', [ProductController::class, 'store'])->name('products.store');
Route::get('/show-products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/edit-products/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/update-products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('destroy-products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/productcode', [product_codesController::class, 'index'])->name('productcode.index');
Route::get('/create-productcode', [product_codesController::class, 'create'])->name('productcode.create');
Route::post('/store-productcode', [product_codesController::class, 'store'])->name('productcode.store');
Route::get('/show-productcode/{id}', [product_codesController::class, 'show'])->name('productcode.show');
Route::get('/edit-productcode/{id}', [product_codesController::class, 'edit'])->name('productcode.edit');
Route::put('/update-productcode/{id}', [product_codesController::class, 'update'])->name('productcode.update');
Route::delete('destroy-productcode/{id}', [product_codesController::class, 'destroy'])->name('productcode.destroy');



Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/create-orders', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/store-orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/show-orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
Route::get('/edit-orders/{id}', [OrdersController::class, 'edit'])->name('orders.edit');
Route::put('/update-orders/{id}', [OrdersController::class, 'update'])->name('orders.update');
Route::delete('destroy-orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');


Route::post('/email', [UserController::class, 'quenmatkhau'])->name('quenmatkhau');
Route::get('/form', [UserController::class, 'viewquenmatkhau'])->name('view.quenmatkhau');

//


// Route::get('hasOne', function () {
//     $item = Product::find(5);
//     dd($item);
// });


// Route::get('hasOneInverse', function () {
//     $item = Product::find(6);
//     dd($item);
// });

// Route::get('hasMany', function () {
// });

// Route::get('hasInverse', function () {
// });

// Route::get('manyManyProducts', function () {
// });

// Route::get('manyManyOrders', function () {
// });
