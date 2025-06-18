<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'create'])->name('register.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::get('forgot-password', function () {
        return view('user.forgot-password');
    })->name('password.request');

Route::post('/forgot-password', [UserController::class, 'forgotPasswordStore'])->name('password.email')->middleware('throttle:3,1');

    Route::get('reset-password/{token}', function (string $token) {
        return view('user.reset-password', ['token' => $token]);
    })->name('password.reset');

Route::post('reset-password', [UserController::class, 'resetPasswordUpdate'])->name('password.update');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart/del-item/{product_id}', [CartController::class, 'delItem'])->name('cart.del_item');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::match(['get', 'post'], '/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');


// Route::group(['middleware' => ['auth','admin']], function () { 
    Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
// });

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/{slug}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.show');
    Route::get('/admin', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin');
    Route::get('/admin/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.store');
    Route::post('/admin/update/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.update');
    Route::post('/admin/delete/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.destroy');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/1users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/1users/edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::post('/admin/users/delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('verify-email', function () {
    return view('user.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['middleware' => 'auth'], function(){
    //редактирование пользователя
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');
});

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:3,1'])->name('verification.send');

Route::get('/home', [ProductController::class, 'index'])->name('home');

Route::redirect('/', '/home');


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Определите маршрут для отображения списка товаров
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Определите маршрут для поиска товаров
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

Route::view('/onas', 'products.onas')->name('onas');


Route::get('/check-tables', function() {
    try {
        $tables = DB::select('SHOW TABLES');
        $productsExists = Schema::hasTable('products');
        
        return [
            'all_tables' => $tables,
            'products_table_exists' => $productsExists,
            'products_count' => $productsExists ? DB::table('products')->count() : 0
        ];
    } catch (\Exception $e) {
        return ['error' => $e->getMessage()];
    }
});